<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 02.12.14
 * Time: 11:40
 */

namespace Ibrows\EasySysLibrary\Tests\Functional\API;

use Ibrows\EasySysLibrary\API\APIInterface;
use Ibrows\EasySysLibrary\API\Invoice;

class ApiInvoiceTest extends AbstractAPITest
{
    public function testInvoiced()
    {

    }

    /**
     * @return APIInterface
     */
    protected function getApi()
    {
        return new Invoice($this->getConnection());
    }
}