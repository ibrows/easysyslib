<?php
/**
 * Created by iBROWS AG.
 * User: marcsteiner
 * Date: 06.11.14
 * Time: 15:52
 */
namespace Ibrows\EasySysLibrary\Converter;

use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 * Class AbstractConverter
 * @package Ibrows\EasySysLibrary\Converter
 */
abstract class AbstractConverter
{

    /**
     * @var array
     */
    protected $dataEasySys = array();

    /**
     * @var null
     */
    protected $modelClass = null;
    /**
     * @var null
     */
    protected $mapping = null;

    /**
     * @return array
     */
    public function getMapping()
    {
        return $this->mapping;
    }

    /**
     * @param array $mapping
     */
    public function setMapping($mapping)
    {
        $this->mapping = $mapping;
    }

    /**
     * @return string
     */
    public function getModelClass()
    {
        return $this->modelClass;
    }

    /**
     * @param string $modelClass
     */
    public function setModelClass($modelClass)
    {
        $this->modelClass = $modelClass;
    }


    /**
     * @param array $data
     */
    public function setArray(array $data)
    {
        $this->set($data);
    }

    /**
     * @param $object
     */
    public function setObject($object)
    {
        $this->set($object);
    }

    /**
     * @param $objectOrArray
     */
    protected function set($objectOrArray)
    {
        $this->dataEasySys = array();
        $accessor = PropertyAccess::createPropertyAccessor();
        foreach ($this->getMapping() as $mappingEasySys => $mappingLib) {
            if (is_array($objectOrArray)) {
                $mappingLib = "[$mappingLib]";
            }
            $this->dataEasySys[$mappingEasySys] = $accessor->getValue($objectOrArray, $mappingLib);
        }
    }

    /**
     * @param $objectOrArray
     * @return mixed
     */
    protected function get($objectOrArray)
    {
        $accessor = PropertyAccess::createPropertyAccessor();
        foreach ($this->dataEasySys as $key => $value) {
            $mappingLib = $this->getMapping()[$key];
            if (is_array($objectOrArray)) {
                $mappingLib = "[$mappingLib]";
            }
            $accessor->setValue($objectOrArray, $mappingLib, $value);
        }
        return $objectOrArray;
    }


    /**
     * @return array
     */
    public function getArray()
    {
        return $this->get(array());
    }

    /**
     * @return object
     */
    public function getObject()
    {
        $reflection = new \ReflectionClass($this->getModelClass());
        $object = $reflection->newInstanceWithoutConstructor();
        return $this->get($object);
    }

    /**
     * @return array
     */
    public function getDataEasySys()
    {
        return $this->dataEasySys;
    }

    /**
     * @param array $dataEasySys
     */
    public function setDataEasySys($dataEasySys)
    {
        $this->dataEasySys = $dataEasySys;
    }


}