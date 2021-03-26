<?php


namespace App\Controller;


use App\Repository\MakeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MakeController extends AbstractController
{
    /**
     * @Route("/make",name="make_list")
     */
    public function list(MakeRepository $makeRepository){

        $make=$makeRepository->findAll();

        if (!$make){
            throw $this->createNotFoundException('There is no make');
        }

        return $this->render('make/list.html.twig',[
            'make'=>$make
        ]);

    }

}