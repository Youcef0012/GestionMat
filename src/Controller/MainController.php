<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/equippement/{name?}", name="costum")
     */
    public function equippement(Request $request)
    {
 //return $this->json(["message"=> "hello !!","another message"=>"welcome"]);
        dump($request);
        return $this->render('home/equippement.html.twig');
    }



}
