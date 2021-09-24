<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Environment;
use App\Entity\User;
use App\Form\ConnectType;

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
    public function inscription(Environment $twig, Request $request, EntityManagerInterface $emi){

        $user = new User();
        $form = $this->createForm(ConnectType::class, $user);

        if($form->isSubmitted() && $form->isValid()){
            $emi->persist($user);
            $emi->flush();
        }

        return new Response($twig->render('account/inscription.html.twig', [
            'userForm' => $form->createView()
        ]));
    }
}
