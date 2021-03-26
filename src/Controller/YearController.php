<?php


namespace App\Controller;


use App\Entity\ModelYear;
use App\Repository\MakeRepository;
use App\Repository\ModelRepository;
use App\Repository\ModelYearRepository;
use App\Repository\YearRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class YearController extends AbstractController
{

    /**
     * @Route("/make/model/{slug}",name="year_list")
     */
    public function list($slug, ModelRepository $modelRepository,ModelYearRepository $modelYearRepository)
    {
        $model = $modelRepository->findOneBy(['slug'=>$slug]);


        $modelYear=$modelYearRepository->findBy(['model'=>$model]);


        if (!$modelYear){
            throw $this->createNotFoundException('There is no year yet');
        }
        return $this->render('year/list.html.twig',[

            'modelYear'=>$modelYear,
            'model'=>$model


        ]);

    }

}