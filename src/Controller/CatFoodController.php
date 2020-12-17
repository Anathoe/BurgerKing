<?php

namespace App\Controller;

use App\Entity\CatFood;
use App\Form\CatFoodType;
use App\Repository\CatFoodRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/cat/food")
 */
class CatFoodController extends AbstractController
{
    /**
     * @Route("/", name="cat_food_index", methods={"GET"})
     */
    public function index(CatFoodRepository $catFoodRepository): Response
    {
        return $this->render('cat_food/index.html.twig', [
            'cat_foods' => $catFoodRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="cat_food_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $catFood = new CatFood();
        $form = $this->createForm(CatFoodType::class, $catFood);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($catFood);
            $entityManager->flush();

            return $this->redirectToRoute('cat_food_index');
        }

        return $this->render('cat_food/new.html.twig', [
            'cat_food' => $catFood,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cat_food_show", methods={"GET"})
     */
    public function show(CatFood $catFood): Response
    {
        return $this->render('cat_food/show.html.twig', [
            'cat_food' => $catFood,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cat_food_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CatFood $catFood): Response
    {
        $form = $this->createForm(CatFoodType::class, $catFood);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cat_food_index');
        }

        return $this->render('cat_food/edit.html.twig', [
            'cat_food' => $catFood,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cat_food_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CatFood $catFood): Response
    {
        if ($this->isCsrfTokenValid('delete'.$catFood->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($catFood);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cat_food_index');
    }
}
