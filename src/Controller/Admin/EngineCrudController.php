<?php

namespace App\Controller\Admin;

use App\Entity\Engine;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EngineCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Engine::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name'),
            TextField::new('slug')->onlyOnDetail(),
        ];
    }
    public function configureActions(Actions $actions): Actions
    {
        return parent::configureActions($actions->add(Crud::PAGE_INDEX, Action::DETAIL)); // TODO: Change the autogenerated stub
    }

}
