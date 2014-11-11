<?php
namespace Ibrows\EasySysLibrary\ApiOld;
use Ibrows\EasySysLibrary\Connection\Connection;
/**
 * @author marcsteiner
 *
 */

class OrderPositionDiscount extends AbstractType
{

    public function __construct(Connection $connection, $parentType, $invoiceId)
    {
        parent::__construct($connection);
        $this->type = 'kb_position_discount';
        $this->parentType = $parentType;
        $this->parentId = $invoiceId;
    }

}
