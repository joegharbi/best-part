<?php

namespace App\Form;

use App\Entity\Car;
use App\Entity\Category;
use App\Entity\Engine;
use App\Entity\Model;
use App\Entity\Transmission;
use App\Entity\Year;
use App\Repository\ModelRepository;
use App\Repository\TransmissionRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('engine', EntityType::class,
                ['label' => 'Please chose an engine',
                    'placeholder' => '---Chose an engine please ---',
                    'class' => Car::class,
                    'choice_label' => 'engine'])
            ->add('year', EntityType::class,
                ['label' => 'Please chose a year',
                    'placeholder' => '---Chose a year please ---',
                    'class' => Car::class,
                    'choice_label' => 'year'])
            ->add('transmission', EntityType::class,
                ['label' => 'Please chose a transmission',
                    'placeholder' => '---Chose a transmission please ---',
                    'class' => Transmission::class,
                    'choice_label' => function(Transmission  $transmission){
                $transmission= $transmission->getCars();
                $transmission->toArray();
                dump($transmission);
                    }]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
