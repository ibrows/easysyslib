<?php
namespace Ibrows\EasySysLibrary\ApiOld;
use Ibrows\EasySysLibrary\Connection\Connection;
/**
 * @author marcsteiner
 *
 */

class OrderPositionArticle extends AbstractType
{

    public function __construct(Connection $connection, $parentType, $invoiceId)
    {
        parent::__construct($connection);
        $this->type = 'kb_position_article';
        $this->parentType = $parentType;
        $this->parentId = $invoiceId;
    }

}
