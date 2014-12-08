<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 15:42
 */

namespace Ibrows\EasySysLibrary\Converter\Type;

use Ibrows\EasySysLibrary\Converter\OrderPositionDefaultConverter;
use Ibrows\EasySysLibrary\Converter\OrderPositionItemConverter;
use Ibrows\EasySysLibrary\Converter\OrderPositionSubPositionConverter;
use Ibrows\EasySysLibrary\Converter\OrderPositionTextConverter;

class OrderPositionConverter extends Converter
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
     */
    public function __construct($key = 'type', $multi = true)
    {
        $this->multi = $multi;
        $this->key = $key;
        $this->types = array(
            'KbPositionArticle'     => new OrderPositionItemConverter(),
            'KbPositionCustom'      => new OrderPositionDefaultConverter(),
            'KbPositionText'        => new OrderPositionTextConverter(),
            'KbPositionSubposition' => new OrderPositionSubPositionConverter(),
        );
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
            $type = $context[$key];
            $types = $this->getTypes();
            if (!array_key_exists($type, $types)) {
                throw new \Exception("Type " . $type . " is not a valid OrderPosition");
            }
            return $types[$type];
        }
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
}