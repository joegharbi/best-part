<?php

namespace App\EventDispatcher;


use App\Event\ProductViewEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ProductViewEmailSubscriber implements EventSubscriberInterface
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger=$logger;
    }

    public static function getSubscribedEvents()
    {
        return [
            'product.view' => 'sendViewEmail'
        ];
    }

    public function sendViewEmail(ProductViewEvent $productViewEvent)
    {
        $this->logger->info('Email sent for product view N_'.
            $productViewEvent->getProduct()->getId());
    }
}
