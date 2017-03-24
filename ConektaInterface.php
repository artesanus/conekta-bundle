<?php

namespace Artesanus\ConektaBundle;

use Conekta\Customer;
use Conekta\Order;

interface ConektaInterface
{
    /**
     * @return Customer
     */
    public function customer();

    /**
     * @return Order
     */
    public function order();
}
