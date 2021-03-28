<?php


namespace App\Doctrine\Subscribers;


use App\Entity\MaterialMaster;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class MaterialMasterSubscriber implements EventSubscriberInterface
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
        if ($entity instanceof MaterialMaster) {
            $entity->getMake() ? $entity->setSlug(strtolower($this->slugger->slug($entity->getMake()))) : null;
            $entity->getModel() ? $entity->setSlug(strtolower($this->slugger->slug($entity->getModel()))) : null;
            $entity->getYear() ? $entity->setSlug(strtolower($this->slugger->slug($entity->getYear()))) : null;
            $entity->getEngine() ? $entity->setSlug(strtolower($this->slugger->slug($entity->getEngine()))) : null;
            $entity->getTransmission() ? $entity->setSlug(strtolower($this->slugger->slug($entity->getTransmission()))) : null;
        }
    }
}