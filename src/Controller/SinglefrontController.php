<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SinglefrontController extends AbstractController
{
    /**
     * @Route("/single", name="single")
     */
    public function index(): Response
    {
        return $this->render('singlefront/index.html.twig', [
            'controller_name' => 'SingleController',
        ]);
    }
}
