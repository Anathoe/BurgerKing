<?php

namespace App\Controller;

use App\Entity\Sliders;
use App\Form\SlidersType;
use App\Repository\SlidersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/sliders")
 */
class SlidersController extends AbstractController
{
    /**
     * @Route("/", name="sliders_index", methods={"GET"})
     */
    public function index(SlidersRepository $slidersRepository): Response
    {
        return $this->render('sliders/index.html.twig', [
            'sliders' => $slidersRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="sliders_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $slider = new Sliders();
        $form = $this->createForm(SlidersType::class, $slider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($slider);
            $entityManager->flush();

            return $this->redirectToRoute('sliders_index');
        }

        return $this->render('sliders/new.html.twig', [
            'slider' => $slider,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sliders_show", methods={"GET"})
     */
    public function show(Sliders $slider): Response
    {
        return $this->render('sliders/show.html.twig', [
            'slider' => $slider,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sliders_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Sliders $slider): Response
    {
        $form = $this->createForm(SlidersType::class, $slider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sliders_index');
        }

        return $this->render('sliders/edit.html.twig', [
            'slider' => $slider,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sliders_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Sliders $slider): Response
    {
        if ($this->isCsrfTokenValid('delete'.$slider->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($slider);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sliders_index');
    }
}
