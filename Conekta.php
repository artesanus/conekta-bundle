<?php

namespace Artesanus\ConektaBundle;

use Conekta\Conekta as ConektaBase;
use Conekta\Charge;
use Conekta\Customer;
use Conekta\Order;

class Conekta extends ConektaBase implements ConektaInterface
{
    /**
     * {@inheritdoc}
     */
    public function customer()
    {
        return Customer::class;
    }

    /**
     * {@inheritdoc}
     */
    public function order()
    {
        return Order::class;
    }
}


