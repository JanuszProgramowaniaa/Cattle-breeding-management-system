<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Yaml\Yaml;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Farm;


class farmController extends AbstractController
{
    #[Route('/farm/{page}', name: 'farm')]

   
    public function index(ManagerRegistry $doctrine, $page = 1): Response
    { 

        $itemPerPage = Yaml::parseFile('../config/site/config.yaml')['FARMS_PER_PAGE'];

        $farms = $doctrine->getRepository(Farm::class)->getAllFarms($page, $itemPerPage);
        $totalFarms = count($farms);

        $maxPages = ceil($totalFarms / $itemPerPage);



        return $this->render('farm/index.html.twig',[
            'farms' => $farms,
            'totalItems' => $totalFarms,
            'curentPage' => $page,
            'itemPerPage' => $itemPerPage,
            'maxPages' => $maxPages
        ]);
    }
}