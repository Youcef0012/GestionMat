<?php

namespace App\Controller;

use App\Entity\Equippement;
use App\Form\EquippementDetailsType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/main", name="category")
 */
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
     * @Route("/NewCat/", name="NewCat")
     * @return Response
     */
    public function nouvelleCategory()
    {
        return $this->render('home/type_equippement.html.twig');
    }

    /**
     * @Route("/NewEq/", name="NewEq")
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function nouveauEquippement1(Request $request)
    {
        $equippement = new Equippement();
        $form = $this->createForm(EquippementDetailsType::class, $equippement);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();

            $equippement->setCreatedAt(new \DateTime('now'));


            if ($equippement->getcategory()!=null) $equippement->setType($equippement->getcategory()->getName());

            $em->persist($equippement);
            $em->flush();
        }
        return $this->render('home/newequippementBuilt.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
