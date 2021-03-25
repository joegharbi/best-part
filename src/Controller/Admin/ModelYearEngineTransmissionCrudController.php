<?php

namespace App\Controller\Admin;

use App\Entity\ModelYearEngineTransmission;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class ModelYearEngineTransmissionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ModelYearEngineTransmission::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            AssociationField::new('modelYearEngine'),
            AssociationField::new('transmission'),
        ];
    }

}
