<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Doctor;


class doctorController extends AbstractController
{
    #[Route('/doctor', name: 'doctor')]


    public function index(ManagerRegistry $doctrine): Response
    { 

        $doctors = $doctrine->getRepository(Doctor::class)->findAll();

        return $this->render('doctor/index.html.twig',[
            'doctors' => $doctors
        ]);
    }
}