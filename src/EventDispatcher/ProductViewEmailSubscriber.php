<?php

namespace App\EventDispatcher;


use App\Event\ProductViewEvent;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

class ProductViewEmailSubscriber implements EventSubscriberInterface
{
    protected $logger;
    protected $mailer;

    public function __construct(LoggerInterface $logger,MailerInterface $mailer)
    {
        $this->logger=$logger;
        $this->mailer=$mailer;
    }

    public static function getSubscribedEvents()
    {
        return [
            'product.view' => 'sendViewEmail'
        ];
    }

    public function sendViewEmail(ProductViewEvent $productViewEvent)
    {
//        $email=new TemplatedEmail();
//        $email->from(new Address('contact@mail.com','Best Part Online'))
//            ->to('admin@mail.com')
//            ->text('Test Someone visited the product n_'.$productViewEvent->getProduct()->getId())
//            ->htmlTemplate('emails/product_view.html.twig')
//            ->context([
//                'product'=>$productViewEvent->getProduct()
//            ])
//            ->subject('Visiting product n_'.$productViewEvent->getProduct()->getId());
//
//
//        $this->mailer->send($email);


        $this->logger->info('Email sent for product view N_'.
            $productViewEvent->getProduct()->getId());
    }
}
