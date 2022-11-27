<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\Type\LoginType;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class loginController extends AbstractController
{
    #[Route('/login', name: 'login')]

   
    public function index(Request $request, ManagerRegistry $doctrine, EncoderFactoryInterface $encoder): Response
    { 

        $form = $this->createForm(LoginType::class);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));
    
            if ($form->isSubmitted() && $form->isValid()) {

                $user = $doctrine->getRepository(User::class)->findOneBy( ['login' => $form->getData()['login']  ] );

          

                if( $encoder->isPasswordValid($user->getPassword(), $form->getData()['password'])){
                    dd('Zalogowano');
                }else{
                    dd('Strzelaj dalej');
                }
                
                return $this->render('index/index.html.twig');

            }
        }
        
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