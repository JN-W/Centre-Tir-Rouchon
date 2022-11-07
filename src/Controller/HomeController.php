<?php

namespace App\Controller;

use App\Entity\News;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home')]
    public function home(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(News::class);
        $allNews = $repository->findAll();
        return $this->render('home/home.html.twig', [
            'allNews' => $allNews,
        ]);
    }

    #[Route('/home2')]
    public function home2(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(News::class);
        $allNews = $repository->findAll();
        return $this->render('home/index.html.twig', [
            'allNews' => $allNews,
        ]);
    }

}

