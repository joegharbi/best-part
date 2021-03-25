<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('Name'),
            TextEditorField::new('shortDescription'),
            TextareaField::new('mainPictureFile')->setFormType(VichImageType::class)->hideOnIndex()->hideOnDetail()
            ->setFormTypeOption('allow_delete',false),
            ImageField::new('mainPicture')->setBasePath('/images/mainPictures')->hideOnForm(),
            DateField::new('updatedAt')->onlyOnIndex(),
            AssociationField::new('subCategory'),
            MoneyField::new('price')->setCurrency('EUR'),


        ];
    }
    public function configureActions(Actions $actions): Actions
    {
        return parent::configureActions($actions->add(Crud::PAGE_INDEX, Action::DETAIL)); // TODO: Change the autogenerated stub
    }
}