<?php


namespace App\Controller;

use App\Taxes\Detector;
use App\Taxes\Calculator;
use Cocur\Slugify\Slugify;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HelloController{


    /**
     * @Route("/hello/{name}",name="hello")
     */
    public function hello($name="World",Environment $twig)
    {

        $html=$twig->render('hello.html.twig',[
            'name'=>$name,
            'formatuer1'=>['prenom'=>'Youssef','nom'=>'Gharbi'],
            'formatuer2'=>['prenom'=>'Ahmed','nom'=>'Gharbi']
        ]);
        return new Response($html);
    }




}