<?php

namespace App\Controller\Admin;

use App\Entity\Transmission;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TransmissionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Transmission::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
