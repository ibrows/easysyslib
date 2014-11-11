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
     * @param $object
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
    public function setDataEasySys($dataEasySys);

    /**
     * @return array
     */
    public function convertEasySysToArray(array $result);

    /**
     * @return object
     */
    public function convertEasySysToObject($result);

    /**
     * @param $mixed
     * @return array
     */
    public function convertToEasySys($mixed);
}