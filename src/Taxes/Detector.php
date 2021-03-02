<?php

namespace App\Taxes;

class Detector{


    protected $seuil;

    public function __construct(float $seuil){


        $this->seuil=$seuil;
}

    public function Detect(float $val):bool{


        if ($val< $this->seuil){
            return false;
        }
        else
            return true;

    }



}