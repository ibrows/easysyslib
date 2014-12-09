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

class DateTime implements TypeInterface
{
    /**
     * @var string
     */
    protected $format;

    /**
     * @var string
     */
    protected $timeZone;

    /**
     * @param string $format
     * @param string $timeZone
     */
    public function __construct($format, $timeZone)
    {
        $this->format = $format;
        $this->timeZone = $timeZone;
    }

    /**
     * @param \DateTime $value
     * @return string
     */
    public function convertToEasySys($value = null)
    {
        if (!$value) {
            return null;
        }

        if (!$value instanceof \DateTime) {
            throw new \RuntimeException("Value need to be an \\DateTime - " . gettype($value) . " given.");
        }

        return $value->format($this->format);
    }

    /**
     * @param string $value
     * @return \DateTime
     */
    public function convertFromEasySys($value = null)
    {
        if (!$value) {
            return null;
        }

        return new \DateTime($value, new \DateTimeZone($this->timeZone));
    }
}