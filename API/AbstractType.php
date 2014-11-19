<?php
namespace Ibrows\EasySysLibrary\API;

use Ibrows\EasySysLibrary\Connection\ConnectionInterface;
use Ibrows\EasySysLibrary\Connection\Exception\ConnectionException;
use Ibrows\EasySysLibrary\Connection\Exception\Status404Exception;
use Ibrows\EasySysLibrary\Converter\ConverterInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * @author marcsteiner
 *
 */
class AbstractType implements APIInterface
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var ConnectionInterface
     */
    protected $connection;

    /**
     * @var string
     */
    protected $type;
    /**
     * @var string
     */
    protected $parentType;
    /**
     * @var string
     */
    protected $parentId;

    /**
     * @var ConverterInterface
     */
    protected $converter;

    /**
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
        $this->logger = new NullLogger();

    }

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param ConnectionInterface $connection
     */
    public function setConnection($connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return ConnectionInterface
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @return ConverterInterface
     */
    public function getConverter()
    {
        return $this->converter;
    }

    /**
     * @param ConverterInterface $converter
     */
    public function setConverter($converter)
    {
        $this->converter = $converter;
    }

    /**
     * @return string
     */
    public function getParentType()
    {
        return $this->parentType;
    }

    /**
     * @param $parentType
     */
    public function setParentType($parentType)
    {
        $this->parentType = $parentType;
    }

    /**
     * @return string
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @param $parentId
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }

    /**
     * @param null $resource
     * @return null|string
     */
    protected function getResource($resource = null)
    {
        if (!$resource) {
            $resource = $this->type;
        }
        if ($this->parentType) {
            $resource = "{$this->parentType}/{$this->parentId}/$resource";
        }
        return $resource;
    }

    /**
     * @param string $resource
     * @param array  $urlParams
     * @param array  $postParams
     * @param string $method
     * @param int    $limit
     * @param int    $offset
     * @param null   $orderBy
     * @throws ConnectionException
     * @return array
     */
    public function call($resource = null, $urlParams = array(), $postParams = array(), $method = 'GET', $limit = 0, $offset = 0, $orderBy = null)
    {
        return $this->connection->call($this->getResource($resource), $urlParams, $postParams, $method, $limit, $offset, $orderBy);
    }


    /**
     * @param $id
     * @throws ConnectionException
     * @return array|null
     */
    public function show($id)
    {
        try {
            return $this->connection->call($this->getResource() . '/' . $id, array(), array(), "GET");
        } catch (Status404Exception $e) {
            return null;
        }
    }

    /**
     * @param $id
     * @throws ConnectionException
     * @return object
     */
    public function showObject($id)
    {
        return $this->converter->convertEasySysToObject($this->show($id));

    }

    /**
     * @param $id
     * @throws ConnectionException
     * @return array
     */
    public function showArray($id)
    {
        return $this->converter->convertEasySysToArray($this->show($id));
    }


    /**
     * @param array  $criteria
     * @param string $type resource
     * @param int    $limit
     * @param int    $offset
     * @param null   $orderBy
     * @throws ConnectionException
     * @return array
     */
    public function search(array $criteria = array(), $type = null, $limit = 0, $offset = 0, $orderBy = null)
    {
        $append = '';
        $method = 'GET';
        if (sizeof($criteria) > 0) {
            $append = '/search';
            $criteria = $this->convertSimpleCriteria($criteria);
            $method = 'POST';
        }
        return $this->connection->call($this->getResource($type) . $append, array(), $criteria, $method, $limit, $offset, $orderBy);
    }


    /**
     * @param array  $criteria
     * @param string $type resource
     * @param int    $limit
     * @param int    $offset
     * @param null   $orderBy
     * @throws ConnectionException
     * @return array of objects
     */
    public function searchObjects(array $criteria = array(), $type = null, $limit = 0, $offset = 0, $orderBy = null)
    {
        $result = $this->search($criteria, $type, $limit, $offset, $orderBy);
        return array_map(array($this->converter, "convertEasySysToObject"), $result);
    }

    /**
     * @param array  $criteria
     * @param string $type resource
     * @param int    $limit
     * @param int    $offset
     * @param null   $orderBy
     * @throws ConnectionException
     * @return array
     */
    public function searchArrays(array $criteria = array(), $type = null, $limit = 0, $offset = 0, $orderBy = null)
    {
        $result = $this->search($criteria, $type, $limit, $offset, $orderBy);
        return array_map(array($this->converter, "convertEasySysToArray"), $result);
    }


    /**
     * @param array $data
     * @param null  $type
     * @param bool  $includeUserId
     * @throws ConnectionException
     * @return array
     */
    public function create(array $data, $type = null, $includeUserId = true)
    {
        if ($includeUserId) {
            $data['user_id'] = $this->connection->getUserId();
        }
        return $this->connection->call($this->getResource($type), array(), $data, "POST");
    }


    /**
     * @param      $object
     * @param null $type
     * @param bool $includeUserId
     * @throws ConnectionException
     * @return object
     */
    public function createFromObject($object, $type = null, $includeUserId = true)
    {
        $result = $this->create($this->converter->convertToEasySys($object), $type, $includeUserId);
        return $this->converter->convertEasySysToObject($result);
    }

    /**
     * @param array $data
     * @param null  $type
     * @param bool  $includeUserId
     * @throws ConnectionException
     * @return array
     */
    public function createFromArray(array $data, $type = null, $includeUserId = true)
    {
        $data = $this->converter->convertToEasySys($data);
        $result = $this->create($data, $type, $includeUserId);
        return $this->converter->convertEasySysToArray($result);
    }

    /**
     * @param int   $id
     * @param array $data
     * @param null  $type
     * @throws ConnectionException
     * @return array
     */
    public function update($id, array $data, $type = null)
    {
        return $this->connection->call($this->getResource($type) . "/$id", array(), $data, "POST");
    }

    /**
     * @param int  $id
     * @param      $object
     * @param null $type
     * @throws ConnectionException
     * @return object
     */
    public function updateFromObject($id, $object, $type = null)
    {
        $result = $this->update($id, $this->converter->convertToEasySys($object), $type);
        return $this->converter->convertEasySysToObject($result);
    }

    /**
     * @param int   $id
     * @param array $data
     * @param null  $type
     * @throws ConnectionException
     * @return array
     */
    public function updateFromArray($id, array $data, $type = null)
    {
        $result = $this->update($id, $this->converter->convertToEasySys($data), $type);
        return $this->converter->convertEasySysToArray($result);
    }

    /**
     * @param $id
     * @throws ConnectionException
     * @return boolean|null
     */
    public function delete($id)
    {
        try {
            $return = $this->connection->call($this->getResource() . '/' . $id, array(), array(), "DELETE");
            return (bool)$return['success'];
        } catch (Status404Exception $e) {
            return false;
        }
    }


    /**
     * Converts simple criteria like:
     * [ 'name' => 'abc' ]
     * to full easySys criteria
     * @param array  $simpleCriteria
     * @param string $operator
     * @return array
     */
    public function convertSimpleCriteria(array $simpleCriteria, $operator = '=')
    {
        $criteria = array();
        foreach ($simpleCriteria as $key => $value) {
            if ($value == null) {
                continue;
            }
            if (is_array($value)) {
                if (array_key_exists('field', $value)
                    && array_key_exists('value', $value)
                ) {
                    //seems to be already $criteria
                    return $simpleCriteria;
                }
            }

            $newKey = $this->converter->keyConvertToEasySys($key);
            if ($newKey !== false) {
                $key = $newKey;
            }
            $criteria[] = array(
                'field'    => $key,
                'value'    => $value,
                'criteria' => $operator
            );
        }
        return $criteria;
    }


    /**
     * @deprecated use search
     * @param      $simplecrits
     * @param null $type
     * @return array
     */
    public function find($simplecrits, $type = null)
    {
        return $this->search($simplecrits, $type);
    }

    /**
     * @param $nr
     * @return array|null
     */
    public function findOneByNr($nr)
    {
        $crits = array(
            'nr' => $nr
        );
        $found = $this->search($crits);
        if (sizeof($found) > 0) {
            return $found[0];
        }
        return null;
    }

    /**
     * @deprecated use show
     * @param $id
     * @return array|null
     */
    public function findOneById($id)
    {
        return $this->show($id);
    }


    /**
     * @deprecated use create
     */
    public function save()
    {
        $this->create(func_get_args());
    }


}
