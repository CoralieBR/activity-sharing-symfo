<?php

namespace App\Controller;

use App\Entity\MessageContact;
use App\Form\ContactType;
use App\Repository\MessageContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ContactController extends AbstractController
{
   
    
    /**
     * @Route("/contact", name="contact", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $messageContact = new MessageContact();
        $messageContact->setReception(new \DateTime('now'));
        $form = $this->createForm(ContactType::class, $messageContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($messageContact);
            $entityManager->flush();

            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'contact' => $messageContact,
            'form' => $form->createView(),
        ]);
    }
    
}