<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\MediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(MediaRepository $mr, ArticleRepository $ar)
    {
        $carouselList = $mr->findBy(['isInCarousel' => true], ['placeCarousel' => 'ASC']);
        return $this->render('home/index.html.twig', [
            'carouselImages' => $carouselList,
        ]);

        $textPresentation = $ar->find(3);

            if(!$textPresentation){
                throw $this->createNotFoundException(
                    "c'est vide connard"
                );
            } 

        return $this->render('home/index.html.twig', [
            'textPresentation' => $textPresentation
        ]);
    
    }

    /**
     * @Route("/presentation", name="presentation")
     */

    public function presentation(MediaRepository $mr)
    {
        
        $image = $mr->find(2); 
        return $this->render('presentation/presentation.html.twig', [
            'imagePresentation' => $image,
        ]);
    }

    /**
     * @Route("/services", name="services")
     */

    public function services()
    {
        return $this->render('services/services.html.twig', [
            'controller_name' => 'HomeController'
        ]);
    }
    /**
     * @Route("/gallery", name="gallery")
     */

    public function gallery(MediaRepository $mr)

    {
       $galleryList = $mr->findBy(['isInGallery' => true]);
        return $this->render('gallery/gallery.html.twig', [
            'galleryImages' => $galleryList,
        ]);
    }
    
}
