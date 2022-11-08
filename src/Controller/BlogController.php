<?php

namespace App\Controller;

use App\Entity\News;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog')]
    public function blog(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(News::class);
        $allNews = $repository->findAll();
        return $this->render('blog/blog.html.twig', [
            'allNews' => $allNews,
        ]);
    }

    #[Route('/blog/{id}', name: 'app_blog_detail')]
    public function detail(News $news, ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(News::class);
//        $news = $repository->findAll();
        return $this->render('blog/detail.html.twig', [
            'actu' => $news,
        ]);
    }

    #[Route('/blog/news')]
    public function blogNews(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(News::class);
        $allClubNews = $repository->findAllCategoryResults('actualite');

        return $this->render('blog/actu.html.twig', [
            'allClubNews' => $allClubNews,
        ]);
    }

    #[Route('/blog/results')]
    public function blogResults(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(News::class);
        $allSportResults = $repository->findAllCategoryResults('results');

        return $this->render('blog/result.html.twig', [
            'allSportResults' => $allSportResults,
        ]);
    }
}
