<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class MailerController extends AbstractController
{
    /**
     * @Route("/email")
     */
    public function sendEmail(MailerInterface $mailer): Response
    {
    //     $email = (new Email())
    //         ->from('hello@example.com')
    //         // defining the email address and name as an object
    //         // (email clients will display the name)
    //         ->from(new Address('fabien@example.com', 'Fabien'))

    //         ->to('you@example.com')
    //         ->cc('cc@example.com')
    //         ->addBcc('cc2@example.com')
    //         ->subject('Time for Symfony Mailer!')
    //         ->text('Sending emails is fun again!')
    //         ->html('<p>See Twig integration for better HTML integration!</p>');
    //         // attach a file stream
    //         ->text(fopen('/path/to/emails/user_signup.txt', 'r'))
    //         ->html(fopen('/path/to/emails/user_signup.html', 'r'))

    //     $mailer->send($email);
            $email = (new TemplatedEmail())
            ->from('fabien@example.com')
            ->to(new Address('ryan@example.com'))
            ->addBcc('cc2@example.com')
            ->subject('Thanks for signing up!')

            // path of the Twig template to render
            ->htmlTemplate('mailer/index.html.twig')

            // pass variables (name => value) to the template
            ->context([
                'expiration_date' => new \DateTime('+7 days'),
                'username' => 'foo',
            ]);
            $mailer->send($email);
    }
}
