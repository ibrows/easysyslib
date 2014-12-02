<?php

/**
 * Created by PhpStorm.
 * Project: coffeeconnection
 *
 * User: mikemeier
 * Date: 02.12.14
 * Time: 11:31
 */

namespace Ibrows\EasySysLibrary\API;

class Invoice extends AbstractApi
{
    public function markAsInvoiced($id)
    {
        return $this->connection->call("$this->type/$id/issue", array(), array(), "POST");
    }

    public function markAsPayed($id, $value)
    {
        return $this->connection->call("$this->type/$id/payment", array(), array('value' => $value), "POST");
    }

    public function show($id)
    {
        return $this->connection->call("$this->type/$id");
    }
} 