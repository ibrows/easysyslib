<?php
/**
 * Created by iBROWS AG.
 * User: marcsteiner
 * Date: 06.11.14
 * Time: 11:38
 */

namespace Ibrows\EasySysLibrary\API;

use Ibrows\EasySysLibrary\Connection\ConnectionInterface;
use Psr\Log\LoggerInterface;

interface APIInterface
{
    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger = null);

    /**
     * @param ConnectionInterface $connection
     */
    public function setConnection(ConnectionInterface $connection);

    /**
     * @param string $resource
     * @param array $urlParams
     * @param array $postParams
     * @param string $method
     * @param int $limit
     * @param int $offset
     * @param null $orderBy
     * @return array
     */
    public function call($resource = null, $urlParams = array(), $postParams = array(), $method = 'GET', $limit = 0, $offset = 0, $orderBy = null);

} 