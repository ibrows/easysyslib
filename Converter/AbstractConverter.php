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
abstract class AbstractConverter implements ConverterInterface
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

    protected function getPropertyAccessor(){
        return PropertyAccess::createPropertyAccessor();
    }

    /**
     * @param $objectOrArray
     * @return mixed
     */
    protected function get($objectOrArray)
    {
        $additionalData = array();
        $accessor = $this->getPropertyAccessor();
        foreach ($this->dataEasySys as $key => $value) {
            if(!array_key_exists($key,$this->getMapping())){
                $additionalData[$key] = $value;
                continue;
            }
            $mappingLib = $this->getMapping()[$key];
            if (is_array($objectOrArray)) {
                $mappingLib = "[$mappingLib]";
            }
            $accessor->setValue($objectOrArray, $mappingLib, $value);
        }
        if(count($additionalData)>0){
            if (is_array($objectOrArray)) {
                $accessor->setValue($objectOrArray, '[additionalData]', $additionalData);
            }else{
                $accessor->setValue($objectOrArray, 'additionalData', $additionalData);
            }
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
        if($dataEasySys == null){
            $dataEasySys = array();
        }
        $this->dataEasySys = $dataEasySys;
    }

    /**
     * @return array
     */
    public function convertEasySysToArray(array $result = null){
        $this->setDataEasySys($result);
        return $this->getArray();
    }
    /**
     * @return object
     */
    public function convertEasySysToObject($result){
        $this->setDataEasySys($result);
        return $this->getObject();
    }

    /**
     * @param $mixed
     * @return array
     */
    public function convertToEasySys($mixed){
        if(is_array($mixed)){
            $this->setArray($mixed);
        }else{
            $this->setObject($mixed);
        }
        return $this->getDataEasySys();

    }
}