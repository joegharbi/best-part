<?php

namespace App\Taxes;


use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\DependencyInjection\LoggerPass;

class Calculator{

    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger=$logger;
    }

    public function tva(float $price):float
    {

        $this->logger->info("calculated price: $price");
        return $price*(20/100);

    }


}
