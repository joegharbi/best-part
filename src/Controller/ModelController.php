<?php


namespace App\Controller;


use App\Repository\MakeRepository;
use App\Repository\ModelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ModelController extends AbstractController
{

    /**
     * @Route("/make/{slug}",name="model_list")
     */
    public function list($slug, MakeRepository $makeRepository,ModelRepository $modelRepository)
    {
        $make = $makeRepository->findOneBy(['slug'=>$slug]);

        $model=$modelRepository->findBy(['make'=>$make]);

        if (!$model){
            throw $this->createNotFoundException('There is no models yet');
        }
        return $this->render('model/list.html.twig',[

            'model'=>$model,
            'make'=>$make

        ]);

    }

}