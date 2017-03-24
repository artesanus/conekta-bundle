<?php

namespace Artesanus\ConektaBundle\Tests\Service;

use Artesanus\ConektaBundle\Tests\KernelTestCase;
use Artesanus\ConektaBundle\Service\Conekta;

class ConektaTest extends KernelTestCase
{
    public static $customer = array(
        'name'  => "ConektaBundle User",
        'email' => "usuario@example.com",
        'phone' => "+5215555555555",
        'corporate' => true,
        'payment_sources' => array(array(
            'token_id' => "tok_test_visa_4242",
            'type' => "card"
        )),
        'shipping_contacts' => array(array(
            'phone' => "+5215555555555",
            'receiver' => "Marvin Fuller",
            'between_streets' => "Ackerman Crescent",
            'address' => array(
                'street1' => "250 Alexis St",
                'street2' => "fake street",
                'city' => "Red Deer",
                'state' => "Alberta",
                'country' => "CA",
                'postal_code' => "T4N 0B8",
                'residential' => true
            )
        ))
    );

    public function testCustomer()
    {
        $container = $this->getContainer();

        $conekta = $container->get('artesanus.conekta');

        $customer = $conekta->customer();

        $customer = $customer::create(self::$customer);

        $this->assertTrue(strpos(get_class($customer), 'Customer') !== false);
    }

}