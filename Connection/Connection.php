<?php

/**
 * Created by PhpStorm.
 * Project: EasySysLibrary
 *
 * User: mikemeier
 * Date: 06.11.14
 * Time: 13:58
 */

namespace Ibrows\EasySysLibrary\Connection;

use Ibrows\EasySysLibrary\Connection\Exception\ConnectionException;
use Ibrows\EasySysLibrary\Connection\Exception\ContentException;
use Ibrows\EasySysLibrary\Connection\Exception\ContentTypeException;
use Ibrows\EasySysLibrary\Connection\Exception\StatusCodeException;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Saxulum\HttpClient\HttpClientInterface;
use Saxulum\HttpClient\Request;
use Saxulum\HttpClient\Response;

class Connection implements ConnectionInterface
{
    /**
     * @var string
     */
    const CONTENT_TYPE_HEADER = 'Content-Type';

    /**
     * @var string
     */
    const CONTENT_TYPE_JSON = 'application/json';

    /**
     * @var string
     *
     * @see https://docs.easysys.ch / EndPoint https://office.easysys.ch/api2.php
     * @see https://devdocs.easysys.ch / EndPoint https://beta.easysys.ch/api2.php | https://dev.easysys.ch/api2.php
     */
    protected $serviceUri = 'https://office.easysys.ch/api2.php';

    /**
     * @var HttpClientInterface
     */
    protected $httpClient;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var string
     */
    protected $companyName;

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var int
     */
    protected $userId;

    /**
     * @var string
     */
    protected $signatureKey;

    /**
     * @var Response
     */
    protected $lastResponse;

    /**
     * @var Request
     */
    protected $lastRequest;

    /**
     * @param HttpClientInterface $httpClient
     * @param string $companyName
     * @param string $apiKey
     * @param string $signatureKey
     * @param int $userId
     */
    public function __construct(HttpClientInterface $httpClient, $companyName, $apiKey, $signatureKey, $userId)
    {
        $this->httpClient = $httpClient;
        $this->companyName = $companyName;
        $this->apiKey = $apiKey;
        $this->signatureKey = $signatureKey;
        $this->userId = $userId;
        $this->logger = new NullLogger();
    }

    /**
     * @param string $resource
     * @param array $urlParams
     * @param array $postParams
     * @param string $method
     * @param int $limit
     * @param int $offset
     * @param string $orderBy
     * @throws ConnectionException
     * @return array
     */
    public function call($resource, $urlParams = array(), $postParams = array(), $method = Request::METHOD_GET, $limit = 0, $offset = 0, $orderBy = null)
    {
        $loggerContext = $this->getNewLoggerContext();
        $logger = $this->logger;

        $logger->debug('New call to ' . $resource, $loggerContext);

        $request = $this->lastRequest = $this->getRequest($resource, $urlParams, $postParams, $method, $limit, $offset, $orderBy);
        $logger->debug((string)$request, $loggerContext);

        try {
            $response = $this->lastResponse = $this->httpClient->request($request);
            $logger->debug((string)$response, $loggerContext);
        } catch (\Exception $e) {
            $logger->alert('General HttpClientException received: ' . $e->getMessage(), $loggerContext);
            throw new ConnectionException("General HttpClientException", null, $e);
        }

        $statusCode = $response->getStatusCode();

        /**
         * StatusCode 304 = The resource has not been changed
         * @todo Maybe switch to statusCode >= 400 || statusCode < 200
         * @see https://docs.easysys.ch/#http-codes
         */
        if (($statusCode >= 300 || $statusCode < 200) && $statusCode !== 304) {
            $logger->alert('StatusCode ' . $statusCode . ' received!', $loggerContext);
            throw new StatusCodeException('StatusCode ' . $statusCode . '  recevied - Expected StatusCode 2xx');
        }

        return $this->transformResponse($response, $loggerContext);
    }

    /**
     * @return Response
     */
    public function getLastResponse()
    {
        return $this->lastResponse;
    }

    /**
     * @return Request
     */
    public function getLastRequest()
    {
        return $this->lastRequest;
    }

    /**
     * @param HttpClientInterface $httpClient
     */
    public function setHttpClient(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $serviceUri
     */
    public function setServiceUri($serviceUri)
    {
        $this->serviceUri = $serviceUri;
    }

    /**
     * @param string $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @param string $signatureKey
     */
    public function setSignatureKey($signatureKey)
    {
        $this->signatureKey = $signatureKey;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }



    /**
     * @param Response $response
     * @param array $loggerContext
     * @throws ContentException
     * @throws ContentTypeException
     * @return array
     */
    protected function transformResponse(Response $response, array $loggerContext)
    {
        $logger = $this->logger;
        $contentType = $response->getHeader(self::CONTENT_TYPE_HEADER);

        if (strtolower($contentType) !== strtolower(self::CONTENT_TYPE_JSON)) {
            $logger->alert('Header ' . self::CONTENT_TYPE_HEADER . ' is ' . $contentType . ' instead of ' . self::CONTENT_TYPE_JSON, $loggerContext);
            throw new ContentTypeException('Header ' . self::CONTENT_TYPE_HEADER . ' is ' . $contentType . ' instead of ' . self::CONTENT_TYPE_JSON);
        }

        $json = json_decode($response->getContent(), true);
        if (!is_array($json)) {
            $logger->alert('Invalid JSON received - decode not possible', $loggerContext);
            throw new ContentException('Invalid JSON received - decode not possible');
        }

        return $json;
    }

    /**
     * @return array
     */
    protected function getNewLoggerContext()
    {
        return array(
            'request' => uniqid()
        );
    }

    /**
     * @param string $resource
     * @param array $urlParams
     * @param array $postParams
     * @param string $method
     * @param int $limit
     * @param int $offset
     * @param string $orderBy
     * @return Request
     */
    protected function getRequest($resource, array $urlParams = array(), array $postParams = array(), $method = Request::METHOD_GET, $limit = 0, $offset = 0, $orderBy = null)
    {
        $url = $this->getRequestUrl($resource, $urlParams);
        $content = $this->getRequestContent($postParams);
        $headers = $this->getRequestHeaders($method, $url, $content);
        return new Request('1.1', $method, $url, $headers, $content);
    }

    /**
     * @param array $postParams
     * @return string
     */
    protected function getRequestContent(array $postParams = array())
    {
        return $postParams ? json_encode($postParams) : '';
    }

    /**
     * @param string $method
     * @param string $uri
     * @param string $content
     * @return array
     */
    protected function getRequestHeaders($method, $uri, $content)
    {
        return array(
            'Accept'         => self::CONTENT_TYPE_JSON,
            'Signature'      => $this->getRequestSignature($method, $uri, $content),
            'Content-Length' => strlen($content)
        );
    }

    /**
     * @param string $method
     * @param string $url
     * @param string $content
     * @return string
     */
    protected function getRequestSignature($method, $url, $content)
    {
        return md5(strtolower($method) . $url . $content . $this->signatureKey);
    }

    /**
     * @return string
     */
    protected function getBaseUrl()
    {
        // https://office.easysys.ch/api2.php/%company_id%/%user_id%/%public_key%
        return sprintf('%s/%s/%s/%s', $this->serviceUri, $this->companyName, $this->userId, $this->apiKey);
    }

    /**
     * @param string $resource
     * @param array $urlParams
     * @return string
     */
    protected function getRequestUrl($resource, array $urlParams = array())
    {
        $url = $this->getBaseUrl() . '/'. ltrim($resource, '/');
        return $urlParams ? $url . '?' . http_build_query($urlParams, null, '&') : $url;
    }
}