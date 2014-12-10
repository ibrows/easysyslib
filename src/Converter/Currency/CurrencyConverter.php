<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 20:38
 */

namespace Ibrows\EasySysLibrary\Converter\Currency;

use Ibrows\EasySysLibrary\Converter\AbstractConverter;

class CurrencyConverter extends AbstractConverter
{
    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Currency';

    /**
     * @var array
     */
    protected $mapping = array(
        'id'           => 'id',
        'name'         => 'name',
        'round_factor' => 'roundFactor',
    );
} 