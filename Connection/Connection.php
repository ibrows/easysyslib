<?php

/**
 * Created by PhpStorm.
 * Project: EasySysLibrary
 * 
 * User: mikemeier
 * Date: 06.11.14
 * Time: 13:58
 */

namespace Ibrows\EasySysLibrary\Connection;

class Connection implements ConnectionInterface
{
    /**
     * @var string
     *
     * @see https://docs.easysys.ch / EndPoint https://office.easysys.ch/api2.php
     * @see https://devdocs.easysys.ch / EndPoint https://beta.easysys.ch/api2.php | https://dev.easysys.ch/api2.php
     */
    protected $serviceUri = 'https://office.easysys.ch/api2.php';
    
    public function __construct()
    {
        
    }
}