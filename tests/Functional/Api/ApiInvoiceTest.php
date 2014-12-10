<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 02.12.14
 * Time: 11:40
 */

namespace Ibrows\EasySysLibrary\Tests\Functional\Api;

use Ibrows\EasySysLibrary\Api\ApiInterface;
use Ibrows\EasySysLibrary\Api\InvoiceApi;

class ApiInvoiceTest extends AbstractApiTest
{
    public function testInvoiced()
    {

    }

    /**
     * @return ApiInterface|InvoiceApi
     */
    protected function getApi()
    {
        return new InvoiceApi($this->getConnection());
    }
}