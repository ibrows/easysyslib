<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 14:03
 */

namespace Ibrows\EasySysLibrary\Converter\Type;

use Ibrows\EasySysLibrary\Converter\ConverterInterface;

class Converter implements TypeInterface
{
    /**
     * @var ConverterInterface
     */
    protected $converter;

    /**
     * @var bool
     */
    protected $multi;

    /**
     * @param ConverterInterface $converter
     * @param bool $multi
     */
    public function __construct(ConverterInterface $converter, $multi = true)
    {
        $this->converter = $converter;
        $this->multi = $multi;
    }

    /**
     * @param mixed $value
     * @throws \Exception
     * @return mixed
     */
    public function convertFromEasySys($value)
    {
        if (!$value) {
            return $this->multi ? array() : null;
        }

        if ($this->multi) {
            if (!is_array($value)) {
                throw new \Exception("Data given to converter is not an array, given: " . gettype($value));
            }

            $values = array();
            foreach ($value as $easySysData) {
                $converter = clone $this->getConverter($easySysData);
                $converter->setDataEasySys($easySysData);
                $values[] = $converter;
            }

            return $values;
        }

        $converter = clone $this->getConverter($value);
        $converter->setDataEasySys($value);
        return $converter;
    }

    /**
     * @param mixed $value
     * @throws \Exception
     * @return mixed
     */
    public function convertToEasySys($value)
    {
        if (!$value) {
            return null;
        }

        if ($this->isMulti()) {
            if (!is_array($value) && !$value instanceof \Traversable) {
                throw new \Exception("Data given to converter is not an array nor \\Traversable, given: " . gettype($value));
            }

            $values = array();
            foreach ($value as $key => $data) {
                if (is_array($data)) {
                    $this->getConverter()->setArray($data);
                } else {
                    $this->getConverter()->setObject($data);
                }
                $values[$key] = $this->getConverter()->getDataEasySys();
            }

            return $values;
        }

        if (is_array($value)) {
            $this->getConverter()->setArray($value);
        } else {
            $this->getConverter()->setObject($value);
        }

        return $this->getConverter()->getDataEasySys();
    }

    /**
     * @param array|object|null $context
     * @return ConverterInterface
     */
    public function getConverter($context = null)
    {
        return $this->converter;
    }

    /**
     * @param ConverterInterface $converter
     */
    public function setConverter(ConverterInterface $converter = null)
    {
        $this->converter = $converter;
    }

    /**
     * @return boolean
     */
    public function isMulti()
    {
        return $this->multi;
    }

    /**
     * @param boolean $multi
     */
    public function setMulti($multi)
    {
        $this->multi = $multi;
    }
}