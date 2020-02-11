<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType; 

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index()
    {
       $form = $this->createForm(ContactType::class);

       return $this->render('contact/contact.html.twig',[
           'our_form' => $form->createView()
       ]);

    }
}
