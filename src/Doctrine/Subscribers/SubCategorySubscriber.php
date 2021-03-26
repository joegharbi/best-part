<?php


namespace App\Doctrine\Subscribers;


use App\Entity\Category;
use App\Entity\SubCategory;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class SubCategorySubscriber implements EventSubscriberInterface
{


    /**
     * @var SluggerInterface
     */
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {


        $this->slugger = $slugger;
    }

    public static function getSubscribedEvents()
    {
        return[
            BeforeEntityPersistedEvent::class=>['setSlug']
        ];
    }

    public function setSlug(BeforeEntityPersistedEvent $event)
    {
        $entity=$event->getEntityInstance();
        if($entity instanceof SubCategory){
            $entity->setSlug(strtolower($this->slugger->slug($entity->getName())));
        }
    }
}