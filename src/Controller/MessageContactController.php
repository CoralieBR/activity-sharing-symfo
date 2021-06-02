<?php

namespace App\Controller;

use App\Entity\MessageContact;
use App\Form\MessageContactType;
use App\Repository\MessageContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;

/**
 * @Route("/admin/message_contact")
 */
class MessageContactController extends AbstractController
{
    /**
     * @Route("/", name="message_contact_index", methods={"GET"})
     */
    public function index(MessageContactRepository $messageContactRepository): Response
    {
        return $this->render('message_contact/index.html.twig', [
            'message_contacts' => $messageContactRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="message_contact_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $messageContact = new MessageContact();
        $form = $this->createForm(MessageContactType::class, $messageContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($messageContact);
            $entityManager->flush();

            return $this->redirectToRoute('message_contact_index');
        }

        return $this->render('message_contact/new.html.twig', [
            'message_contact' => $messageContact,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="message_contact_show", methods={"GET"})
     */
    public function show(MessageContact $messageContact): Response
    {
        return $this->render('message_contact/show.html.twig', [
            'message_contact' => $messageContact,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="message_contact_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MessageContact $messageContact, MailerInterface $mailer): Response
    {
        $form = $this->createForm(MessageContactType::class, $messageContact);
        $form->handleRequest($request);
        $messageContact->setReponse(new \DateTime('now'));
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            

            $email = (new Email())
                     ->from('stutz.vic@gmail.com')
                     ->to($messageContact->getEmail())       
                     ->subject('Réponse à votre message')
                     ->text($messageContact->getAnswer());
        
            $mailer->send($email);
            return $this->redirectToRoute('message_contact_index');
        }

        return $this->render('message_contact/edit.html.twig', [
            'message_contact' => $messageContact,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="message_contact_delete", methods={"POST"})
     */
    public function delete(Request $request, MessageContact $messageContact): Response
    {
        if ($this->isCsrfTokenValid('delete'.$messageContact->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($messageContact);
            $entityManager->flush();
        }

        return $this->redirectToRoute('message_contact_index');
    }
}
