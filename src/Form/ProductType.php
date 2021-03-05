<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder->add('name',TextType::class,[
            'label'=>'Product name',
            'attr'=>['placeholder'=>'Write the product name'],
            'required' =>false])

            ->add('shortDescription',TextareaType::class,
                ['label'=>'Product description',
                    'attr'=>['placeholder'=>'Write short description for the product']])

            ->add('price',MoneyType::class,['label'=>'Product price',
                'attr'=>['placeholder'=>'Write the price in Euro'],'divisor'=>100,'required'=>false]
            )
            ->add('mainPicture',UrlType::class,[
                'label'=>'Product Image',
                'attr'=>['placeholder'=>'Enter image Url'],
                'required'=>false
            ])
            ->add('category',EntityType::class,
                ['label'=>'Please chose a category',
                    'placeholder'=>'---Chose a category please ---',
                    'class'=>Category::class,
                    'choice_label'=>'name']);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
