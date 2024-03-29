<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use App\Entity\Category;
use App\Entity\Engine;
use App\Entity\Make;
use App\Entity\Model;
use App\Entity\ModelYear;
use App\Entity\ModelYearEngine;
use App\Entity\ModelYearEngineTransmission;
use App\Entity\PartCar;
use App\Entity\PartModel;
use App\Entity\Product;
use App\Entity\Purchase;
use App\Entity\PurchaseItem;
use App\Entity\SubCategory;
use App\Entity\Transmission;
use App\Entity\User;
use App\Entity\Year;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Menu\SubMenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Factory\MenuFactory;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
//        return parent::index();
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(UserCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Fast Part');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');

        yield  MenuItem::section('Users');
        yield MenuItem::linkToCrud('Users', 'fas fa-users', User::class);


        yield  MenuItem::section('Products and categories');
        yield MenuItem::linkToCrud('Category', 'fas fa-tags', Category::class);
        yield MenuItem::linkToCrud('SubCategory', 'fas fa-tags', SubCategory::class);
        yield MenuItem::linkToCrud('Product', 'fas fa-tags', Product::class);
        yield MenuItem::linkToCrud('Spare Part', 'fas fa-tags', PartCar::class);

        yield  MenuItem::section('Finance');
        yield MenuItem::linkToCrud('Purchase', 'fas fa-sticky-note', Purchase::class);
        yield MenuItem::linkToCrud('Purchase Item', 'fas fa-list', PurchaseItem::class);

        yield MenuItem::section('Make, Model and Year');
        yield MenuItem::linkToCrud('Make', 'fas fa-tags', Make::class);
        yield MenuItem::linkToCrud('Model', 'fas fa-tags', Model::class);
        yield MenuItem::linkToCrud('Year','fas fa-tags',Year::class);
        yield MenuItem::linkToCrud('Engine','fas fa-tags',Engine::class);
        yield MenuItem::linkToCrud('Transmission','fas fa-tags',Transmission::class);
        yield MenuItem::linkToCrud('VIN','fas fa-tags',Car::class);
        yield  MenuItem::section();
        yield MenuItem::subMenu('Other','fas fa-house-user')->setSubItems([
            MenuItem::linkToRoute('Go to website', 'fas fa-list','homepage'),
            MenuItem::linkToLogout('logout','fa fa-sign-out')
        ]);


    }
}
