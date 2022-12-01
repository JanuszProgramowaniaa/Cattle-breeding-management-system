<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Doctor;


class doctorController extends AbstractController
{
    #[Route('/doctor/{page}', name: 'doctor')]


    public function index(ManagerRegistry $doctrine, $page = 1): Response
    { 
        $itemPerPage = 2;
        $doctors = $doctrine->getRepository(Doctor::class)->getAllDoctors($page, $itemPerPage);
        $totalDoctors = count($doctors);

        $maxPages = ceil(5 / 2);

        dd($maxPages);

        return $this->render('doctor/index.html.twig',[
            'doctors' => $doctors,
            'totalDoctors' => $totalDoctors,
            'curentPage' => $page,
            'itemPerPage' => $itemPerPage,
            'maxPages' => $maxPages
        ]);
    }
}