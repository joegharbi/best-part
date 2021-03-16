<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class,[
                'attr'=>['placeholder'=>'Type your mail.']
            ])
            ->add('fullName', TextType::class,[
                'attr'=>['placeholder'=>'Type your full name.']
            ])
            ->add('password', PasswordType::class,[
                'attr'=>['placeholder'=>'Type your password.']
            ])
            ->add('confirm_password',PasswordType::class,[
                'attr'=>['placeholder'=>'Confirm your password.']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
