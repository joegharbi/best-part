<?php


namespace App\Controller;


use App\Entity\ModelYear;
use App\Repository\MakeRepository;
use App\Repository\ModelRepository;
use App\Repository\ModelYearEngineRepository;
use App\Repository\ModelYearRepository;
use App\Repository\YearRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EngineController extends AbstractController
{

    /**
     * @Route("/make/model/year/{slug}",name="engine_list")
     */
    public function list($slug, ModelYearRepository $modelYearRepository,ModelYearEngineRepository $modelYearEngineRepository)
    {
        $year = $modelYearRepository->findOneBy(['year'=>$slug]);


        $engine=$modelYearEngineRepository->findBy(['modelYear'=>$year]);


        if (!$engine){
            throw $this->createNotFoundException('There is no engine yet');
        }
        return $this->render('engine/list.html.twig',[

            'year'=>$year,
            'engine'=>$engine


        ]);

    }

}