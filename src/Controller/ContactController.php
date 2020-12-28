<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use Symfony\Component\BrowserKit\Request;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index()
    {
       $form = $this->createForm(ContactType::class);

       return $this->render('contact/contact.html.twig',[
           'my_form' => $form->createView()
       ]);

    }
}
