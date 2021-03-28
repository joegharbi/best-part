<?php

namespace App\Controller;

use App\Entity\MaterialMaster;
use App\Repository\CarRepository;
use App\Repository\MaterialMasterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{

    /**
     * @var MaterialMasterRepository
     */
    private $masterRepository;
    /**
     * @var CarRepository
     */
    private $carRepository;


    public function __construct(MaterialMasterRepository $masterRepository, CarRepository $carRepository)
    {
        $this->masterRepository = $masterRepository;
        $this->carRepository = $carRepository;


    }


//    /**
//     * @Route("/make/{slug}",name="model_list")
//     */
//    public function list($slug)
//    {
//        $model = $this->masterfind('model');
//        return $this->render('car/car_list.html.twig', [
//            'car' => $model
//        ]);
//    }

    public function masterfind($value): array
    {

        $table = [];
        $master = $this->masterRepository->findAll();

        foreach ($master as $m => $mval) {
            $value == 'make' ? $table[] = $mval->getMake() : null;
            $value == 'model' ? $table[] = $mval->getModel() : null;
            $value == 'engine' ? $table[] = $mval->getEngine() : null;
            $value == 'transmission' ? $table[] = $mval->getTransmission() : null;

        }

        return $table;
    }

    /**
     * @Route("/make",name="make_list")
     */
    public function make()
    {

       $make = $this->masterfind('make');

       // $make=$this->carRepository->findAll();
        return $this->render('car/make_list.html.twig', [
            'make' => $make
        ]);


    }

}