<?php

namespace App\Controller\Admin;

use App\Entity\Make;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MakeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Make::class;
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
