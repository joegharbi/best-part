<?php


namespace App\Doctrine\Subscribers;


use App\Entity\Category;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;

class ProductUpdatedSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return[
            BeforeEntityPersistedEvent::class=>['setCreatedAt'],
            BeforeEntityUpdatedEvent::class=>['setUpdatedAt']
        ];
    }

    public function setCreatedAt(BeforeEntityPersistedEvent $event)
    {
        $entity=$event->getEntityInstance();
        if($entity instanceof Product){
            $entity->setUpdatedAt(new \DateTime());
        }
    }    public function setUpdatedAt(BeforeEntityUpdatedEvent $event)
    {
        $entity=$event->getEntityInstance();
        if($entity instanceof Product){
            $entity->setUpdatedAt(new \DateTime());
        }
    }
}