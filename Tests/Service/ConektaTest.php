<?php

namespace Artesanus\ConektaBundle\Tests\Service;

use Artesanus\ConektaBundle\Tests\KernelTestCase;
use Artesanus\ConektaBundle\Service\Conekta;

class ConektaTest extends KernelTestCase
{
    public static $valid_charge = array(
        'description'=> 'Stogies',
        'reference_id'=> '9839-wolf_pack',
        'amount'=> 50000,
        'currency'=>'MXN',
        'card'=> 'tok_test_visa_4242',
        'details'=> array(
            'name'=> 'Cristian Angulo',
            'phone'=> '403-342-0642',
            'email'=> 'cristianangulo@artesan.us',
            'customer'=> array(
                'corporation_name'=> 'Artesanus\ConektaBundle Inc.',
                'logged_in'=> true,
                'successful_purchases'=> 14,
                'created_at'=> 1379784950,
                'updated_at'=> 1379784950,
                'offline_payments'=> 4,
                'score'=> 9
            ),
            'line_items'=> array(
                array(
                    'name'=> 'Box of Cohiba S1s',
                    'description'=> 'Imported From Mex.',
                    'unit_price'=> 20000,
                    'quantity'=> 1,
                    'sku'=> 'cohb_s1',
                    'type'=> 'food'
                )
            ),
            'billing_address'=> array(
                'street1'=>'77 Mystery Lane',
                'street2'=> 'Suite 124',
                'street3'=> null,
                'city'=> 'Darlington',
                'state'=>'NJ',
                'zip'=> '10192',
                'country'=> 'Mexico',
                'phone'=> '77-777-7777',
                'email'=> 'purshasing@x-men.org'
            ),
            'shipment'=> array(
                'carrier'=> 'estafeta',
                'service'=> 'international',
                'price'=> 20000,
                'address'=> array(
                    'street1'=> '250 Alexis St',
                    'street2'=> null,
                    'street3'=> null,
                    'city'=> 'Red Deer',
                    'state'=> 'Alberta',
                    'zip'=> 'T4N 0B8',
                    'country'=> 'Canada'
                )
            )
        )
    );

    public function testCharge()
    {

        $container = $this->getContainer();

        $conektaService = $container->get('artesanus.conekta');

        $chargeService = $conektaService->charge(self::$valid_charge);

        $this->assertTrue($chargeService->status == 'paid');

    }

}