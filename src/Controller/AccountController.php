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
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;
// use Symfony\Component\PasswordHasher\PasswordHasherInterface;

class AccountController extends AbstractController {

    private $hasherFactory;
    public function __construct(){
        $this->hasherFactory = new PasswordHasherFactory([
            'common' => ['algorithm' => 'argon2id'],
        ]);
    }


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
    	// var_dump($user);

        if($form->isSubmitted() && $form->isValid()){
            // $user->setPassword($encoder->encodePassword($user,$form->get('password')->getData()));

            //récupère la valeur de la propriété password du user passer dans le form
            $password = $form->get('password')->getData();
            
            // $pwhf = new PasswordHasherFactory([
            //     'common' => ['algorithm' => 'argon2id'],
            // ]);
            $passwordHasher = $this->hasherFactory->getPasswordHasher('common');
            $hashed = $passwordHasher->hash($password);

            // $newPassord = $encoder->encodePassword($user, $hashed);
            // dd($newPassord);
            $user->setPassword($hashed);

            $manager->persist($user);
            $manager->flush();
        }

        
        return new Response($twig->render('account/inscription.html.twig', [
            'userForm' => $form->createView()
        ]));
    }
}
