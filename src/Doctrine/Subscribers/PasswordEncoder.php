<?php


namespace App\Doctrine\Subscribers;


use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityUpdatedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Security;


class PasswordEncoder implements EventSubscriberInterface
{


    /**
     * @var Security
     */
    private $security;
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(Security $security,UserPasswordEncoderInterface $encoder)
    {

        $this->security = $security;
        $this->encoder = $encoder;
    }

    public static function getSubscribedEvents()
    {
        return[
            BeforeEntityPersistedEvent::class=>['setPassword'],
            BeforeEntityUpdatedEvent::class=>['setUpdatePassword']


        ];
    }

    public function setPassword(BeforeEntityPersistedEvent $event)
    {
        $entity=$event->getEntityInstance();
        $role=implode($this->security->getUser()->getRoles());

        if($entity instanceof User && (substr_count('ROLE_ADMIN',$role))===0){
            $entity->setRoles(['ROLE_ADMIN']);
            $entity->setPassword($this->encoder->encodePassword($this->security->getUser(),'password'));
            $entity->setCreatedAt(new \DateTime());

        }
    }
    public function setUpdatePassword(BeforeEntityUpdatedEvent $event)
    {
        $entity=$event->getEntityInstance();

        if($entity instanceof User ){
            $entity->setUpdatedAt(new \DateTime());
            $entity->setPassword($this->encoder->encodePassword($this->security->getUser(),$this->security->getUser()->getPassword()));
        }
    }
}