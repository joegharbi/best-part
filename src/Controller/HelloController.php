<?php


namespace App\Controller;

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
    public function hello($name="World",Calculator $calculator,Environment $environment,Slugify $slugify)
    {
        dump($slugify->slugify("Hello World"));
        dump($environment);
        $tva=$calculator->tva(100);
        dump($tva);

        return new Response("Hello $name");
    }




}