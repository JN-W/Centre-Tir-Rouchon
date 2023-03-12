<?php

namespace App\Controller;

use App\Entity\News;
use App\Service\NewsDateComparison;
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
        usort($allNews, [new NewsDateComparison, 'compareNewsCreationDate']);

        return $this->render('blog/blog.html.twig', [
            'allNews' => $allNews,
        ]);
    }



    #[Route('/blog/news')]
    public function blogNews(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(News::class);
        $allClubNews = $repository->findAllCategoryResults('actualite');
        usort($allClubNews, [new NewsDateComparison, 'compareNewsCreationDate']);

        return $this->render('blog/actu.html.twig', [
            'allClubNews' => $allClubNews,
        ]);
    }

    #[Route('/blog/results')]
    public function blogResults(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(News::class);
        $allSportResults = $repository->findAllCategoryResults('results');
        usort($allSportResults, [new NewsDateComparison, 'compareNewsCreationDate']);

        return $this->render('blog/result.html.twig', [
            'allSportResults' => $allSportResults,
        ]);
    }

// Méthode debug
// pourquoi faire un findAll pour afficher un seul article ???
// Le param converter doit me trouver la news avec l'id de la route avant l'utilisation du controller
// donc je n'ai qu'à passer cette news à l'affichage sans même appeler la BDD
    #[Route('/blog/{id}', name: 'app_blog_detail')]
    public function detail(News $news): Response
    {
        $pictures = $news->getPictures();
        return $this->render('blog/detail.html.twig', [
            'actu' => $news,
            'pictures'=> $pictures
        ]);
    }


}
