<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController
{
    /**
     *
     * @Route("/",name="index",schemes={"https","http"})
     *
     */
    public function index()
    {
        dd("Test Index");
    }

    /**
     * @Route("/test/{age<\d+>?0}",name="age",schemes={"https","http"})
     */
    public function test($age)
    {
        return new Response("Vous avez $age ans!");
    }


}
