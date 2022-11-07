<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClubHouseController extends AbstractController
{
    #[Route('/club/house', name: 'app_club_house')]
    public function index(): Response
    {
        return $this->render('club_house/index.html.twig', [
            'controller_name' => 'ClubHouseController',
        ]);
    }
}
