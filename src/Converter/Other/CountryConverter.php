<?php

namespace Ibrows\EasySysLibrary\Converter\Other;

use Ibrows\EasySysLibrary\Converter\AbstractConverter;

/**
 * @see https://docs.easysys.ch/ressources/country/#show-country
 */
class CountryConverter extends AbstractConverter
{
    /**
     * @var string
     */
    protected $modelClass = 'Ibrows\EasySysLibrary\Model\Other\Country';

    /**
     * @var array
     */
    protected $mapping = array(
        'id'                      => 'id', // int
        'name'                    => 'name', // string
        'name_short'              => 'nameShort', // string
        'iso3166_alpha2'          => 'iso3166Alpha2', // string
    );
}