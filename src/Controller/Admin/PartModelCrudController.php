<?php

namespace App\Controller\Admin;

use App\Entity\PartModel;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class PartModelCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PartModel::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            AssociationField::new('model'),
            AssociationField::new('part'),
        ];
    }

}
