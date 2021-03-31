<?php

namespace App\Controller;

use App\Form\CarType;
use App\Repository\CarRepository;
use App\Repository\MakeRepository;
use App\Repository\ModelRepository;
use App\Repository\PartCarRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{

    /**
     * @var MakeRepository
     */
    private $makeRepository;
    /**
     * @var CarRepository
     */
    private $carRepository;
    /**
     * @var ModelRepository
     */
    private $modelRepository;
    /**
     * @var PartCarRepository
     */
    private $partCarRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository,PartCarRepository $partCarRepository,MakeRepository $makeRepository, CarRepository $carRepository, ModelRepository $modelRepository)
    {

        $this->makeRepository = $makeRepository;
        $this->carRepository = $carRepository;
        $this->modelRepository = $modelRepository;
        $this->partCarRepository = $partCarRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * @Route("/make",name="car_make")
     */
    public function make()
    {
        $make = $this->makeRepository->findAll();
        if (!$make) {
            throw $this->createNotFoundException('There is no make');
        }
        return $this->render('car/make_list.html.twig', [
            'make' => $make
        ]);
    }

    /**
     * @Route("/make/{slug}",name="car_list")
     */
    public function list($slug)
    {
        $make = $this->makeRepository->findBy(['slug' => $slug]);
        $model = $this->modelRepository->findBy(['make' => $make]);
        if (!$model) {
            throw $this->createNotFoundException('There is no models yet');
        }
        return $this->render('car/model_list.html.twig', [
            'model' => $model
        ]);
    }

    /**
     * @Route("/make/model/{slug}",name="car")
     */
    public function car($slug, Request $request)
    {
        $model = $this->modelRepository->findOneBy(['slug' => $slug]);

        $form = $this->createForm(CarType::class, ['model' => $model]);
        $formView = $form->createView();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $car = $this->carRepository->findOneBy(['model' => $model, 'transmission' => $data['transmission'],
                'year' => $data['year'],
                'engine' => $data['engine']]);
            if (!$car) {
                throw $this->createNotFoundException('There is no car as you selected yet');
            }
            return $this->redirectToRoute('car_product', ['id' => $car->getId()]);
        }
        return $this->render('car/list.html.twig',
            [
                'formView' => $formView,
            ]);
    }

    /**
     * @Route("/make/model/car/{id}", name="car_product")
     */
    public function product($id)
    {
        $car = $this->carRepository->find($id);
        $parts=$this->partCarRepository->getPartListByCar($car);

        $product=$this->productRepository->getProductByPartCar($parts[0]);

        return $this->render('car/part_list.html.twig',[
            'product'=>$product
        ]);
    }
}