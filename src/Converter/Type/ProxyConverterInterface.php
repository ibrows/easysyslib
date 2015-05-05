<?php

namespace Ibrows\EasySysLibrary\Converter\Type;

use Ibrows\EasySysLibrary\Converter\ConverterInterface;

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 05.05.15
 * Time: 11:43
 */
interface ProxyConverterInterface extends TypeInterface
{
    /**
     * @return ConverterInterface
     */
    public function getConverter();

    /**
     * @return ConverterInterface[]
     */
    public function getConverters();

    /**
     * @param ConverterInterface $converter
     */
    public function setConverter(ConverterInterface $converter);
}