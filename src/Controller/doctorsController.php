<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class doctorsController extends AbstractController
{
    #[Route('/doctors', name: 'doctors')]


    public function index(): Response
    { 
        return $this->render('doctors/index.html.twig');
    }
}