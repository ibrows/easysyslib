<?php
namespace Ibrows\EasySysLibrary\API;
use Ibrows\EasySysLibrary\Connection\Connection;
/**
 * @author marcsteiner
 *
 */

class OrderPositionStandard extends AbstractType
{

    public function __construct(Connection $connection, $parentType, $invoiceId)
    {
        parent::__construct($connection);
        $this->type = 'kb_position_custom';
        $this->parentType = $parentType;
        $this->parentId = $invoiceId;
    }

}
