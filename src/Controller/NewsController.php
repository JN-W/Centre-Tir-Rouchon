<?php

namespace App\Controller;

use App\Entity\News;
use App\Entity\Picture;
use App\Form\NewsType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;



class NewsController extends AbstractController
{
    #[Route('/news/create', name: 'app_news')]
    public function createNews(Request $request, ManagerRegistry $doctrine, SluggerInterface $slugger): Response
    {
        $news = new News();
        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            // Get uploaded pictures
            $pictures = $form->get('pictures')->getData();

            // Loop on pictures
            foreach ($pictures as $picture) {

                // generate safe file name
                $originalFilename = pathinfo($picture->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $file = $safeFilename . '-' . uniqid() . '.' . $picture->guessExtension();

                // copy file to picture upload directory
                $picture->move(
                            $this->getParameter('uploadedPic_directory'),
                            $file
                        );

                // Create picture instance in database
                $pic = new Picture();
                $pic->setPicFilename($file);
                $pic->setPicAsset(sprintf("/uploads/%s", $file));
                $news->addPicture($pic);
            }

//----------------------------------------------------------------------
//            // check if at least one picture has been uploaded
//            if ($pictures) {
//----------------------------------------------------------------------
//                    // Move the file to the directory where brochures are stored
//                    try {
//                        move_uploaded_file($picture, 'uploadedPic_directory');
//                        $picture->move(
//                            $this->getParameter('uploadedPic_directory'),
//                            $newFilename
//                        );
//                    } catch (FileException $e) {
//                        // ... TO DO : handle exception if something happens during file upload
//                    }
// ----------------------------------------------------------

                $entityManager = $doctrine->getManager();
                $entityManager->persist($news);
                $entityManager->flush();

                return $this->redirectToRoute('app_blog_blog');
//            }
        }

        return $this->render('news/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route('/news/modify/{id}')]
    public function modifyNews(News $news, Request $request, ManagerRegistry $doctrine, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            // Get uploaded pictures
            $pictures = $form->get('pictures')->getData();

            // Loop on pictures
            foreach ($pictures as $picture) {

                // generate safe file name
                $originalFilename = pathinfo($picture->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $file = $safeFilename . '-' . uniqid() . '.' . $picture->guessExtension();

                // copy file to picture upload directory
                $picture->move(
                    $this->getParameter('uploadedPic_directory'),
                    $file
                );

                // Create picture instance in database
                $pic = new Picture();
                $pic->setPicFilename($file);
                $pic->setPicAsset(sprintf("/uploads/%s", $file));
                $news->addPicture($pic);
        }

            $entityManager = $doctrine->getManager();
            $entityManager->flush();
            return $this->redirectToRoute('app_blog_blog');
        }

        return $this->render('news/index.html.twig', [
            'form' => $form->createView(),
            'news' => $news
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

    #[Route('/picture/delete/{id}')]
    public function deletePicture(Picture $picture, ManagerRegistry $doctrine, Request $request){
        $data = json_decode($request->getContent(), true);

        // Check if token is ok
        if($this->isCsrfTokenValid('delete'.$picture->getId(), $data['_token'])) {

            // Get picture name
            $name = $picture->getPicFilename();

            // Delete file from server
            unlink($this->getParameter('uploadedPic_directory').'/'.$name);

            // Delete in database
            $em = $doctrine->getManager();
            $em->remove($picture);
            $em->flush();

            // Json response
            return new JsonResponse(['success' => 1]);
        } else {
            return new JsonResponse(['error' => 'token invalide'],400);

        }
    }
}
