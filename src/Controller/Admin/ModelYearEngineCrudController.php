<?php

namespace App\Controller\Admin;

use App\Entity\ModelYearEngine;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class ModelYearEngineCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ModelYearEngine::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            AssociationField::new('engine'),
            AssociationField::new('modelYear'),
        ];
    }

}
