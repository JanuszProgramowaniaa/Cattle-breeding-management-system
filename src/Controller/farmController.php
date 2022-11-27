<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class farmController extends AbstractController
{
    #[Route('/farm', name: 'farm')]

   
    public function index(): Response
    { 
        return $this->render('farm/index.html.twig');
    }
}