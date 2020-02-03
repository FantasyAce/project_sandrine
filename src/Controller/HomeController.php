<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/presentation", name="presentation")
     */

    public function presentation()
    {
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
