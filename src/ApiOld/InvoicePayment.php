<?php
namespace Ibrows\EasySysLibrary\ApiOld;

use Ibrows\EasySysLibrary\Connection\Connection;
/**
 * @author cyrillgsell
 *
 * Zahlung
 */

class InvoicePayment extends AbstractType
{

    public function __construct(Connection $connection)
    {
        parent::__construct($connection);
        $this->type = 'payment';
        $this->parentType = 'kb_invoice';
    }

    public function create($vars, $type = null, $userid = true){
        $type = $this->type;
        if($parentId = $vars['kb_invoice_id']){
            $this->setParentId($parentId);
        }
        if ($this->parentType) {
            $type = "{$this->parentType}/{$this->parentId}/$type";
        }
        return $this->connection->call($type, array(), $vars, "POST");
    }
}
