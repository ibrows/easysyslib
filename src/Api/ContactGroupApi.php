<?php
/**
 * Created by PhpStorm.
 * User: stefanvetsch
 * Date: 09.07.15
 * Time: 16:09
 */

namespace Ibrows\EasySysLibrary\Api;


use Ibrows\EasySysLibrary\Connection\ConnectionInterface;
use Ibrows\EasySysLibrary\Converter\Contact\GroupConverter;

class ContactGroupApi extends AbstractApi
{
    /**
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->converter = new GroupConverter();
        parent::__construct($connection);
    }

    /**
     * @return string
     */
    protected function getType()
    {
        return 'contact_group';
    }
}