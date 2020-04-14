<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Equippement;
use App\Repository\CategoryRepository;
use App\Repository\EquippementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/material", name="category")
 */
class MaterialController extends AbstractController
{
    /**
     * @Route("/CatList", name="CatList")
     * @param CategoryRepository $categoryRepository
     * @return Response
     */
    public function catList(CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->findAll();

        return $this->render('material/categories.html.twig', [
            'categories' => $categories,
        ]);

    }

    /**
     * @Route("/EqList", name="eqList")
     * @param EquippementRepository $equippementRepository
     * @return Response
     */
    public function eqList(EquippementRepository $equippementRepository)
    {
        $equippements = $equippementRepository->findAll();

        return $this->render('material/equippements.html.twig', [
            'equippements' => $equippements,
        ]);

    }


    /**
     * @Route("/createCategory", name="createCategory")
     * @param Request $request
     * @return Response
     */

    public function createCategory(Request $request)
    {
        $category = new Category();
        $typename = $request->get("justtest");
        $category->setName($typename);
        if (empty($typename)) Return new JsonResponse("Veuillez entrer un Type");
        else {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return new Response("category created OK => " . $typename);
        }
    }


    /**;
     * @Route("/CreateEquipment", name="CreateEquipment")
     * @param Request $request
     * @param CategoryRepository $categoryRepository
     * @return Response
     * @throws \Exception
     */

    //Testing Equipement insertion

    public function createEquipement(Request $request, CategoryRepository $categoryRepository)
    {
        $categoryid = null;
        $description = "Des équippements";
        $equipment = new Equippement();
        $equipment->setSerialnumber("Z01FE65G");
        $equipment->setCreatedAt(new \DateTime('now'));
        $equipment->setDescription($description);
        if ($categoryRepository->findOneBy(array('id' => $categoryid)) != null) {
            $category = $categoryRepository->findOneBy(array('id' => $categoryid));
            $equipment->setCategory($category);
            $equipment->setType($category->getName());
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($equipment);
        $em->flush();

        return $this->redirect("/main/material/EqList");
        //   return new Response("category created OK => " . $equipment->getSerialnumber());
    }


    /**
     * @Route("/search/{type?}", name="getsearch")
     * @param Equippement $equippement
     * @return Response
     */
    public function getByType($type, EquippementRepository $equippementRepository)
    {
        $equippement = $equippementRepository->findBy(array('type' => $type));

        return $this->render('material/single_equippement.html.twig',
            [
                'equippement' => $equippement
            ]
        );
    }


}
