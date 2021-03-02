<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{


    /**
     * @Route("/", name="hamepage")
     */
    public function homepage()
    {
        return $this->render('home.html.twig');
    }

}