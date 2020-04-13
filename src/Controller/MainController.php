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
     * @Route("/equippement/{name?}", name="custom")
     * @param Request $request
     * @return Response
     */
    public function equippement(Request $request)
    {
        //return $this->json(["message"=> "hello !!","another message"=>"welcome"]);
        $name = $request->get("name");
        return $this->render('home/newequippement.html.twig',
            [
                'name'=> $name
            ]
        );
    }



}
