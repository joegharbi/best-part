<?php


namespace App\Doctrine\Subscribers;


use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;

class CategoryOwnerSubscriber implements EventSubscriberInterface
{


    /**
     * @var Security
     */
    private $security;

    public function __construct(Security $security)
    {

        $this->security = $security;
    }

    public static function getSubscribedEvents()
    {
        return[
            BeforeEntityPersistedEvent::class=>['setUser']
        ];
    }

    public function setUser(BeforeEntityPersistedEvent $event)
    {
        $entity=$event->getEntityInstance();
        if($entity instanceof Category){
            $entity->setOwner($this->security->getUser());
        }
    }
}