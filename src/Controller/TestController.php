<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController
{

    /**
     *
     * @Route("/,name="index", methods={"GET", "POST"},host="localhost",
     * schemes={"http",https"})
     */

    public function index()
    {
        dd("Test index");
    }

    /**
     *
     * @Route("/test/{age<\d+>?0},name="test", methods={"GET", "POST"},host="localhost",
     * schemes={"http",https"})
     */

    public function test(Request $request, $age)
    {
        return dd($request);
        return dd("Vous avez $age ans!");
    }
}
