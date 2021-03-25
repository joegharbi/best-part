<?php

namespace App\Controller\Admin;

use App\Entity\ModelYear;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ModelYearCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ModelYear::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            AssociationField::new('model'),
            AssociationField::new('year'),
        ];
    }

}
