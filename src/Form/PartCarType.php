<?php

namespace App\Form;

use App\Entity\Car;
use App\Entity\Model;
use App\Entity\PartCar;
use App\Repository\CarRepository;
use App\Repository\PartCarRepository;
use App\Repository\ProductRepository;
use PhpParser\Node\Expr\AssignOp\Mod;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartCarType extends AbstractType
{
    /**
     * @var SessionInterface
     */
    protected $session;
    /**
     * @var PartCarRepository
     */
    private $partCarRepository;

    public function __construct(SessionInterface $session, PartCarRepository $partCarRepository)
    {
        $this->session = $session;
        $this->partCarRepository = $partCarRepository;
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $model=$this->partCarRepository->findAll();
        $builder
            ->add('car', EntityType::class,
            [
                'class'=>PartCar::class,

            ])
//            ->add('car')
        ;
//        $builder
//            ->add('car', EntityType::class, [
//                'class' => Car::class,
//                'mapped'=>false,
//                'placeholder' => '-- Select a model --'
//            ])
//        ;

//        $builder->add('car')->addEventListener( FormEvents::POST_SET_DATA,
//            function (FormEvent $event) {
//
//
//                $form = $event->getForm();
//                dd($form->getData());
//                $data = $event->getData();
//                dump($form->getData());
//            });
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PartCar::class
        ]);
    }
}
