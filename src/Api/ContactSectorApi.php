<?php
/**
 * User: stefanvetsch
 */

namespace Ibrows\EasySysLibrary\Api;


use Ibrows\EasySysLibrary\Connection\ConnectionInterface;
use Ibrows\EasySysLibrary\Converter\Contact\SectorConverter;

class ContactSectorApi extends AbstractApi
{
    /**
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->converter = new SectorConverter();
        parent::__construct($connection);
    }

    /**
     * @return string
     */
    protected function getType()
    {
        return 'contact_branch';
    }
}