<?php
/**
 * Created by iBROWS AG.
 * User: marcsteiner
 * Date: 06.11.14
 * Time: 15:52
 */
namespace Ibrows\EasySysLibrary\Converter;

use Ibrows\EasySysLibrary\Converter\Type\TypeInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyAccessor;

/**
 * Class AbstractConverter
 * @package Ibrows\EasySysLibrary\Converter
 */
abstract class AbstractConverter implements ConverterInterface
{
    /**
     * @var string
     */
    protected $defaultDateTimeFormat = 'YYYY-mm-dd H:i:s';

    /**
     * @var string
     */
    protected $defaultDateFormat = 'YYYY-mm-dd';

    /**
     * @var string
     */
    protected $defaultTimeFormat = 'H:i:s';

    /**
     * @var string
     */
    protected $defaultTimeZone = 'CET';

    /**
     * @var bool
     */
    protected $setNull = false;

    /**
     * @var array
     */
    protected $dataEasySys = array();

    /**
     * @var string
     */
    protected $modelClass;

    /**
     * @var array
     */
    protected $mapping = array();

    /**
     * @var array
     */
    protected $convertTypes = array();

    public function __construct()
    {
        if ($mapping = $this->setupMapping()) {
            $this->setMapping($mapping);
        }

        if ($types = $this->setupConvertTypes()) {
            $this->setConvertTypes($types);
        }
    }

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
    public function setMapping(array $mapping = null)
    {
        $this->mapping = $mapping;
    }

    /**
     * @return string
     */
    public function getDefaultDateTimeFormat()
    {
        return $this->defaultDateTimeFormat;
    }

    /**
     * @param string $defaultDateTimeFormat
     */
    public function setDefaultDateTimeFormat($defaultDateTimeFormat)
    {
        $this->defaultDateTimeFormat = $defaultDateTimeFormat;
    }

    /**
     * @return string
     */
    public function getDefaultTimeFormat()
    {
        return $this->defaultTimeFormat;
    }

    /**
     * @param string $defaultTimeFormat
     */
    public function setDefaultTimeFormat($defaultTimeFormat)
    {
        $this->defaultTimeFormat = $defaultTimeFormat;
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
    public function setDataEasySys(array $dataEasySys = null)
    {
        if ($dataEasySys == null) {
            $dataEasySys = array();
        }
        $this->dataEasySys = $dataEasySys;
    }

    /**
     * @param array $result
     * @return array
     */
    public function convertEasySysToArray(array $result = null)
    {
        $this->setDataEasySys($result);
        return $this->getArray();
    }

    /**
     * @param array $result
     * @return object
     */
    public function convertEasySysToObject(array $result = null)
    {
        $this->setDataEasySys($result);
        return $this->getObject();
    }

    /**
     * @param array|object $mixed
     * @return array
     */
    public function convertToEasySys($mixed)
    {
        if (is_array($mixed)) {
            $this->setArray($mixed);
        } else {
            $this->setObject($mixed);
        }
        return $this->getDataEasySys();

    }

    /**
     * @param string $key
     * @return string
     */
    public function keyConvertToEasySys($key)
    {
        return array_search($key, $this->mapping);
    }

    /**
     * @param string $keyEasySys
     * @return string
     */
    public function keyConvert($keyEasySys)
    {
        if (!array_key_exists($keyEasySys, $this->mapping)) {
            return null;
        }
        return $this->mapping[$keyEasySys];
    }

    /**
     * @return boolean
     */
    public function isSetNull()
    {
        return $this->setNull;
    }

    /**
     * @param boolean $setNull
     */
    public function setSetNull($setNull)
    {
        $this->setNull = $setNull;
    }

    /**
     * @return array
     */
    public function getConvertTypes()
    {
        return $this->convertTypes;
    }

    /**
     * @param array $convertTypes
     */
    public function setConvertTypes(array $convertTypes = null)
    {
        $this->convertTypes = $convertTypes;
    }

    /**
     * @return string
     */
    public function getDefaultTimeZone()
    {
        return $this->defaultTimeZone;
    }

    /**
     * @param string $defaultTimeZone
     */
    public function setDefaultTimeZone($defaultTimeZone)
    {
        $this->defaultTimeZone = $defaultTimeZone;
    }

    /**
     * @return string
     */
    public function getDefaultDateFormat()
    {
        return $this->defaultDateFormat;
    }

    /**
     * @param string $defaultDateFormat
     */
    public function setDefaultDateFormat($defaultDateFormat)
    {
        $this->defaultDateFormat = $defaultDateFormat;
    }

    /**
     * @return array|null
     */
    protected function setupMapping()
    {
        return null;
    }

    /**
     * @return array|null
     */
    protected function setupConvertTypes()
    {
        return null;
    }

    /**
     * @param object|array $objectOrArray
     */
    protected function set($objectOrArray)
    {
        $this->dataEasySys = array();
        $accessor = PropertyAccess::createPropertyAccessor();
        foreach ($this->getMapping() as $mappingEasySys => $mappingLib) {
            if (is_array($objectOrArray)) {
                $mappingLib = "[$mappingLib]";
            }

            $value = $accessor->getValue($objectOrArray, $mappingLib);
            $convertedValue = $this->convertTypeToEasySys($mappingEasySys, $value);

            if ($this->setNull || $convertedValue !== null) {
                $this->dataEasySys[$mappingEasySys] = $convertedValue;
            }
        }
    }

    /**
     * @return PropertyAccessor
     */
    protected function getPropertyAccessor()
    {
        return PropertyAccess::createPropertyAccessor();
    }

    /**
     * @param object|array $objectOrArray
     * @return object|array
     */
    protected function get($objectOrArray)
    {
        $additionalData = array();
        $accessor = $this->getPropertyAccessor();
        $mapping = $this->getMapping();

        foreach ($this->dataEasySys as $key => $value) {
            if (!array_key_exists($key, $mapping)) {
                $additionalData[$key] = $value;
                continue;
            }

            $mappingLib = $mapping[$key];
            if (is_array($objectOrArray)) {
                $mappingLib = "[$mappingLib]";
            }

            $accessor->setValue($objectOrArray, $mappingLib, $this->convertTypeFromEasySys($key, $value));
        }

        if (count($additionalData) > 0) {
            if (is_array($objectOrArray)) {
                $accessor->setValue($objectOrArray, '[additionalData]', $additionalData);
            } else {
                $accessor->setValue($objectOrArray, 'additionalData', $additionalData);
            }
        }

        return $objectOrArray;
    }

    /**
     * @param string $field
     * @param mixed $value
     * @return mixed
     * @throws \Exception
     */
    protected function convertTypeFromEasySys($field, $value)
    {
        if (!$type = $this->getTypeConverter($field)) {
            return $value;
        }
        return $type->convertFromEasySys($value);
    }

    /**
     * @param string $field
     * @return null|TypeInterface
     * @throws \Exception
     */
    protected function getTypeConverter($field)
    {
        $types = $this->getConvertTypes();
        if (!array_key_exists($field, $types)) {
            return null;
        }

        $type = $types[$field];
        if (!$type instanceof TypeInterface) {
            throw new \Exception("Type needs to implement TypeInterface");
        }

        return $type;
    }

    /**
     * @param string $field
     * @param mixed $value
     * @return mixed
     * @throws \Exception
     */
    protected function convertTypeToEasySys($field, $value)
    {
        if (!$type = $this->getTypeConverter($field)) {
            return $value;
        }
        return $type->convertToEasySys($value);
    }
}