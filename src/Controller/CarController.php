<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use App\Repository\MakeRepository;
use App\Repository\ModelRepository;
use App\Repository\ModelYearRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{


    /**
     * @Route("/make",name="car_make")
     */
    public function make(MakeRepository $makeRepository){

        $make=$makeRepository->findAll();

        if (!$make){
            throw $this->createNotFoundException('There is no make');
        }

        return $this->render('car/make_list.html.twig',[
            'make'=>$make
        ]);

    }

    /**
     * @Route("/make/{slug}",name="car_model")
     */
    public function model($slug,MakeRepository $makeRepository,ModelRepository $modelRepository)
    {
        $make = $makeRepository->findOneBy(['slug' => $slug]);

        $model = $modelRepository->findBy(['make' => $make]);

        if (!$model) {
            throw $this->createNotFoundException('There is no models yet');
        }
        return $this->render('car/model_list.html.twig', [

            'model' => $model,
            'make' => $make

        ]);

    }
    /**
     * @Route("/make/model/{slug}",name="car")
     */
    public function car($slug,Request $request,ModelRepository $modelRepository)
    {
        $car=new Car();
        $model = $modelRepository->findOneBy(['slug' => $slug]);

        $form=$this->createForm(CarType::class,$car);

        $formView = $form->createView();

        $form->handleRequest($request);
        if ($form->isSubmitted()&&$form->isValid()){
            dd($form->getName());
        }

        return $this->render('car/list.html.twig',
            [
                'formView' => $formView,
                'model'=>$model
            ]);
    }






//    /**
//     * @Route("/make/{slug}",name="year_list")
//     */
//    public function list($slug, ModelRepository $modelRepository)
//    {
//        $model = $modelRepository->findOneBy(['slug'=>$slug]);
//        if (!$modelYear){
//            throw $this->createNotFoundException('There is no year yet');
//        }
//        return $this->render('model_list.html.twig',[
//
//            'modelYear'=>$modelYear,
//            'model'=>$model
//
//        ]);
//
//    }
}