<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MaladieController extends AbstractController {
   /**
     * @Route("/maladie", name="maladie")
     */
    public function index(): Response {
        return $this->render('maladie/index.html.twig', [
            'controller_name' => 'MaladieController',
        ]);
    }

    /**
     * @Route("/a_propos", name="a_propos")
     */
    public function a_propos(): Response {
        return $this->render('maladie/a_propos.html.twig', [
            'controller_name' => 'MaladieController',
        ]);
    }

     /**
     * @Route("/symptomes", name="symptomes")
     */
    public function symptomes(): Response {
        return $this->render('maladie/symptomes.html.twig', [
            'controller_name' => 'MaladieController',
        ]);
    }
}
