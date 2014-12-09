<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 11:51
 */

namespace Ibrows\EasySysLibrary\Converter\Type;

interface TypeInterface
{
    /**
     * @param mixed $value
     * @return mixed
     */
    public function convertFromEasySys($value);

    /**
     * @param mixed $value
     * @return mixed
     */
    public function convertToEasySys($value);
} 