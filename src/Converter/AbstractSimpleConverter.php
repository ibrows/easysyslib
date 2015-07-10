<?php
/**
 * Created by PhpStorm.
 * User: stefanvetsch
 * Date: 09.07.15
 * Time: 15:36
 */

namespace Ibrows\EasySysLibrary\Converter;


abstract class AbstractSimpleConverter extends AbstractConverter
{
    /**
     * @var array
     */
    protected $mapping = array(
        'id'           => 'id',
        'name'         => 'name',
    );
}