<?php

namespace App\Controller;

use App\Entity\News;
use App\Form\NewsType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\File;



class NewsController extends AbstractController
{
    #[Route('/news/create', name: 'app_news')]
    public function createNews(Request $request, ManagerRegistry $doctrine, SluggerInterface $slugger): Response
    {
        $news = new News();
        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
            /** @var UploadedFile $Pic1File */
        {
            $Pic1File = $form->get('Pic1')->getData();
            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if($Pic1File) {
                $originalFilename = pathinfo($Pic1File->getClientOriginalName(), PATHINFO_FILENAME);
                dump($originalFilename);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$Pic1File->guessExtension();

                $Pic1Asset = sprintf("/uploads/%s", $newFilename );
                $news->setPic1Asset($Pic1Asset);

                // Move the file to the directory where brochures are stored
                try {
                    $Pic1File->move(
                        $this->getParameter('uploadedPic_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... TO DO : handle exception if something happens during file upload
                }
                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $news->setPic1Filename($newFilename);
            }



            // ... persist the $news variable or any other work


            $entityManager = $doctrine->getManager();
            $entityManager->persist($news);
            $entityManager->flush();

           return $this->redirectToRoute('app_blog_blog');
        }

        return $this->render('news/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/news/modify/{id}')]
    public function modifyNews(News $news, Request $request, ManagerRegistry $doctrine, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(NewsType::class, $news);
//        $news->setPic1Filename(new File($this->getParameter('uploadedPic_directory').'/'.$news->getPic1Filename()));
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $Pic1File = $form->get('Pic1')->getData();
            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if($Pic1File) {
                $originalFilename = pathinfo($Pic1File->getClientOriginalName(), PATHINFO_FILENAME);
                dump($originalFilename);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$Pic1File->guessExtension();

                $Pic1Asset = sprintf("/uploads/%s", $newFilename );
                $news->setPic1Asset($Pic1Asset);

                // Move the file to the directory where brochures are stored
                try {
                    $Pic1File->move(
                        $this->getParameter('uploadedPic_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... TO DO : handle exception if something happens during file upload
                }
                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $news->setPic1Filename($newFilename);
            }

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
