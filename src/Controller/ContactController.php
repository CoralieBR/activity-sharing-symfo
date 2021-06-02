<?php

namespace App\Controller;

use App\Entity\MessageContact;
use App\Form\ContactType;
use App\Repository\MessageContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
// use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class ContactController extends AbstractController
{
   
    
    /**
     * @Route("/contact", name="contact", methods={"GET","POST"})
     */
    public function new(Request $request, MailerInterface $mailer): Response
    {   
        $adresses = [];
        $messageContact = new MessageContact();
        $messageContact->setReception(new \DateTime('now'));
        $form = $this->createForm(ContactType::class, $messageContact);
        $form->handleRequest($request);
        

        if ($form->isSubmitted() && $form->isValid()) {
            array_push($adresses, $messageContact->getEmail());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($messageContact);
            $entityManager->flush();
            $email = (new TemplatedEmail())
                    ->from('stutz.vic@gmail.com')      
                    ->subject('Message Contact')
                    ->htmlTemplate('email/contact_message.html.twig');
                    
            foreach($adresses as $adresse){
                
                $email->addTo($adresse);
            }
                    

            $mailer->send($email);
            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'contact' => $messageContact,
            'form' => $form->createView(),
        ]);
    }
    
}