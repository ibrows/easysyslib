<?php
namespace Ibrows\EasySysLibrary\ApiOld;

use Ibrows\EasySysLibrary\Connection\Connection;
/**
 * @author marcsteiner
 *
 */
class Offer extends Order
{

    public function __construct(Connection $connection)
    {
        parent::__construct($connection);
        $this->type = 'kb_offer';
    }


}
