<?php

namespace App\Controller;

use App\Entity\User;
use Twig\Environment;
use App\Form\ConnectType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AccountController extends AbstractController {

    /**
     * @Route("/account", name="account")
     */
    public function index(): Response
    {
        return $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }

    /**
     * @Route("/user_profil", name="userProfil")
     */
    public function userProfil(): Response{
        return $this->render('account/userProfil.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }

    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscription(Environment $twig, Request $request, EntityManagerInterface $manager){

        $user = new User();
        $form = $this->createForm(ConnectType::class, $user);
        $form->handleRequest($request);
    	var_dump($user);

        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($user);
            $manager->flush();
        }

        
        return new Response($twig->render('account/inscription.html.twig', [
            'userForm' => $form->createView()
        ]));
    }
}
