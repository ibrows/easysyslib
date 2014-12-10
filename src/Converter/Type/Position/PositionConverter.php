<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 10.12.14
 * Time: 21:29
 */

namespace Ibrows\EasySysLibrary\Converter\Type\Position;

use Ibrows\EasySysLibrary\Converter\ConverterInterface;
use Ibrows\EasySysLibrary\Converter\Type\ProxyConverter;
use Ibrows\EasySysLibrary\Model\PositionInterface;

abstract class PositionConverter extends ProxyConverter
{
    /**
     * @var string
     */
    protected $key;

    /**
     * @var array
     */
    protected $types;

    /**
     * @param string $key
     * @param bool $multi
     */
    public function __construct($key = 'type', $multi = true)
    {
        $this->multi = $multi;
        $this->key = $key;
        $this->types = $this->setupTypes();
    }

    /**
     * @param array|null|object $context
     * @return \Ibrows\EasySysLibrary\Converter\ConverterInterface
     * @throws \Exception
     */
    public function getConverter($context = null)
    {
        if (!$context) {
            throw new \Exception("Need context");
        }

        $key = $this->getKey();
        if (is_array($context) && array_key_exists($key, $context)) {
            return $this->getConverterForType($context[$key]);
        }

        if ($context instanceof PositionInterface) {
            return $this->getConverterForType($context->getType());
        }

        throw new \Exception("Could not find correct converter for context");
    }

    /**
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * @param array $types
     */
    public function setTypes(array $types = null)
    {
        $this->types = $types;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return array
     */
    abstract protected function setupTypes();

    /**
     * @param string $type
     * @return ConverterInterface
     * @throws \Exception
     */
    protected function getConverterForType($type)
    {
        $types = $this->getTypes();
        if (!array_key_exists($type, $types)) {
            throw new \Exception("Type " . $type . " is not a valid Position");
        }
        return $types[$type];
    }
} 