<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 08.12.14
 * Time: 20:38
 */

namespace Ibrows\EasySysLibrary\Converter\Tax;

use Ibrows\EasySysLibrary\Converter\AbstractConverter;

class TaxConverter extends AbstractConverter
{
    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Tax\Tax';

    /**
     * @var array
     */
    protected $mapping = array(
        'id'    => 'id',
        'value' => 'value',
        'type'  => 'type',
    );
} 