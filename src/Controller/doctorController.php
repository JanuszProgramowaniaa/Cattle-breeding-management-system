<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Doctor;
use Symfony\Component\Yaml\Yaml;


class doctorController extends AbstractController
{
    #[Route('/doctor/{page}', name: 'doctor')]


    public function index(ManagerRegistry $doctrine, $page = 1): Response
    { 
        $itemPerPage = Yaml::parseFile('../config/site/config.yaml')['DOCTORS_PER_PAGE'];

        $doctors = $doctrine->getRepository(Doctor::class)->getAllDoctors($page, $itemPerPage);
        $totalDoctors = count($doctors);

        $maxPages = ceil($totalDoctors / $itemPerPage);

        return $this->render('doctor/index.html.twig',[
            'doctors' => $doctors,
            'totalItems' => $totalDoctors,
            'curentPage' => $page,
            'itemPerPage' => $itemPerPage,
            'maxPages' => $maxPages
        ]);
    }
}