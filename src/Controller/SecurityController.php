<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    // private $urlGenerator;
    
    // public function __construct(UrlGeneratorInterface $urlGenerator)
    // {
    //     $this->urlGenerator = $urlGenerator;
    // }
    
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('accueil');
        // }
        // if ($this->is_granted('ROLE_ADMIN') )

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    // public function start(AuthenticationException $authException = null): RedirectResponse
    // {
    //     if($authException = true){
    //         dd($authException);
    //         return new RedirectResponse($this->urlGenerator->generate('accueil'));
    //     }
    //     // add a custom flash message and redirect to the login page
    //     // $request->getSession()->getFlashBag()->add('note', 'You have to login in order to access this page.');

        
    // }
}
