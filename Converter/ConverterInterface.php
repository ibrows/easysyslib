<?php
/**
 * Created by iBROWS AG.
 * User: marcsteiner
 * Date: 06.11.14
 * Time: 15:52
 */
namespace Ibrows\EasySysLibrary\Converter;

/**
 * Class ConverterInterface
 * @package Ibrows\EasySysLibrary\Converter
 */
interface ConverterInterface
{
    /**
     * @param array $data
     */
    public function setArray(array $data);

    /**
     * @param object $object
     */
    public function setObject($object);

    /**
     * @return array
     */
    public function getArray();

    /**
     * @return object
     */
    public function getObject();

    /**
     * @return array
     */
    public function getDataEasySys();

    /**
     * @param array $dataEasySys
     */
    public function setDataEasySys(array $dataEasySys = null);

    /**
     * @param array $result
     * @return array
     */
    public function convertEasySysToArray(array $result = null);

    /**
     * @param array $result
     * @return object
     */
    public function convertEasySysToObject(array $result = null);

    /**
     * @param array|object $mixed
     * @return array
     */
    public function convertToEasySys($mixed);

    /**
     * @param  string $key
     * @return string|false
     */
    public function keyConvertToEasySys($key);

    /**
     * @param string $keyEasySys
     * @return string|null
     */
    public function keyConvert($keyEasySys);
}