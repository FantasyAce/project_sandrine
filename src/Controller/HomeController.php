<?php

namespace App\Controller;

use App\Repository\MediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(MediaRepository $mr)
    {
        $carouselList = $mr->findBy(['isInCarousel' => true], ['placeCarousel' => 'ASC']);
        return $this->render('home/index.html.twig', [
            'carouselImages' => $carouselList,
        ]);
    }

    /**
     * @Route("/presentation", name="presentation")
     */

    public function presentation(MediaRepository $mr)
    {
        $image = $mr->find(3);
        return $this->render('presentation/presentation.html.twig', [
            'controller_name' => 'HomeController',
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
    
}
