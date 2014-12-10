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
use Ibrows\EasySysLibrary\Model\Invoice\Invoice;
use Ibrows\EasySysLibrary\Model\Invoice\InvoicePositionDefault;
use Ibrows\EasySysLibrary\Model\Invoice\InvoicePositionText;

class ApiInvoiceTest extends AbstractApiTest
{
    /**
     * @return Invoice
     */
    public function testCreateInvoice()
    {
        $api = $this->getApi();

        $invoice = new Invoice($api->getConnection()->getUserId(), $api->getConnection()->getUserId());

        $invoice->addPosition(new InvoicePositionDefault(10, 1, 12.50));
        $invoice->addPosition(new InvoicePositionDefault(5, 4, 9.50));
        $invoice->addPosition(new InvoicePositionDefault(8, 1, 18.50));
        $invoice->addPosition(new InvoicePositionText('Test-Invoice-Position'));

        /** @var Invoice $result */
        $result = $api->createFromObject($invoice);

        $this->assertInstanceOf(get_class($invoice), $result);

        return $result;
    }

    public function testShowPdfObject()
    {
        $invoice = $this->testCreateInvoice();

        $pdfArray = $this->getApi()->showPdfArray($invoice->getId());
        $this->assertInternalType('array', $pdfArray);
        $this->assertArrayHasKey('name', $pdfArray);
        $this->assertArrayHasKey('size', $pdfArray);
        $this->assertArrayHasKey('mime', $pdfArray);
        $this->assertArrayHasKey('content', $pdfArray);
    }

    /**
     * @return ApiInterface|InvoiceApi
     */
    protected function getApi()
    {
        return new InvoiceApi($this->getConnection());
    }
}