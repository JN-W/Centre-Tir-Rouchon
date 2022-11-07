<?php

namespace App\Controller;

use App\Entity\News;
use App\Form\NewsType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    #[Route('/news/create', name: 'app_news')]
    public function createNews(Request $request, ManagerRegistry $doctrine): Response
    {
        $news = new News();
        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($news);
            $entityManager->flush();
        }

        return $this->render('news/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/news/modify/{id}')]
    public function modifyNews(News $news, Request $request, ManagerRegistry $doctrine): Response
    {
        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $doctrine->getManager();
            $entityManager->flush();
            return $this->redirectToRoute('app_blog_blog');
        }

        return $this->render('news/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/news/delete/{id}')]
    public function deleteNews(News $news, ManagerRegistry $doctrine): Response
    {
            $entityManager = $doctrine->getManager();
            $entityManager->remove($news);
            $entityManager->flush();
        return $this->redirectToRoute('app_blog_blog');
    }


}
