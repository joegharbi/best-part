<?php


namespace App\Doctrine\Subscribers;


use App\Entity\Make;
use App\Entity\Year;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class YearSubscriber implements EventSubscriberInterface
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
        return [
            BeforeEntityPersistedEvent::class => ['setSlug']
        ];
    }

    public function setSlug(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();
        if ($entity instanceof Year) {
            $entity->setSlug(strtolower($this->slugger->slug($entity->getYear())));
        }
    }
}