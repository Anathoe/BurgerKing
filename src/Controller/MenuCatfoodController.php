<?php

namespace App\Controller;

use App\Entity\MenuCatfood;
use App\Form\MenuCatfoodType;
use App\Repository\MenuCatfoodRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/menu/catfood")
 */
class MenuCatfoodController extends AbstractController
{
    /**
     * @Route("/", name="menu_catfood_index", methods={"GET"})
     */
    public function index(MenuCatfoodRepository $menuCatfoodRepository): Response
    {
        return $this->render('menu_catfood/index.html.twig', [
            'menu_catfoods' => $menuCatfoodRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="menu_catfood_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $menuCatfood = new MenuCatfood();
        $form = $this->createForm(MenuCatfoodType::class, $menuCatfood);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($menuCatfood);
            $entityManager->flush();

            return $this->redirectToRoute('menu_catfood_index');
        }

        return $this->render('menu_catfood/new.html.twig', [
            'menu_catfood' => $menuCatfood,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="menu_catfood_show", methods={"GET"})
     */
    public function show(MenuCatfood $menuCatfood): Response
    {
        return $this->render('menu_catfood/show.html.twig', [
            'menu_catfood' => $menuCatfood,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="menu_catfood_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MenuCatfood $menuCatfood): Response
    {
        $form = $this->createForm(MenuCatfoodType::class, $menuCatfood);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('menu_catfood_index');
        }

        return $this->render('menu_catfood/edit.html.twig', [
            'menu_catfood' => $menuCatfood,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="menu_catfood_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MenuCatfood $menuCatfood): Response
    {
        if ($this->isCsrfTokenValid('delete'.$menuCatfood->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($menuCatfood);
            $entityManager->flush();
        }

        return $this->redirectToRoute('menu_catfood_index');
    }
}
