<?php

namespace Artesanus\ConektaBundle;

use Conekta\Conekta as ConektaBase;
use Conekta\Charge;
use Conekta\Error;

class Conekta extends ConektaBase implements ConektaInterface
{
    /**
     * @param array $array
     * @return object
     */
    public function charge(array $array)
    {
        try{
            return Charge::create($array);

        }catch(Error $e){
            return $e;
        }

    }
}


