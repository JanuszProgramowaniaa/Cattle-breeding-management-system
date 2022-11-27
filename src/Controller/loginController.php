<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\Type\LoginType;

class loginController extends AbstractController
{
    #[Route('/login', name: 'login')]

   
    public function index(): Response
    { 


        
        $form = $this->createForm(LoginType::class)->createView();
        return $this->render('login/index.html.twig', [
            'form' => $form,
        ]);
    }


    #[Route('/registraion', name: 'registration')]

   
    public function registration(): Response
    { 

        return $this->render('login/registration.html.twig');
    }
}