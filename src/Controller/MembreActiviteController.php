<?php

namespace App\Controller;

use App\Entity\MembreActivite;
use App\Form\MembreActiviteType;
use App\Form\MembreActivityType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MembreActiviteController extends AbstractController
{
    // /**
    //  * @Route("/membre/activite", name="membre_activite")
    //  */
    // public function index(): Response
    // {
    //     return $this->render('membre_activite/index.html.twig', [
    //         'controller_name' => 'MembreActiviteController',
    //     ]);
    // }
    /**
     * @Route("/profile/activite/new", name="membre_activite_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $membre= $this->getUser();
        // $membreactivite = new MembreActivite;
        // $membreactivite->setMembres($idmembre);
        $form = $this->createForm(MembreActivityType::class, $membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($membre);
            $entityManager->flush();

            return $this->redirectToRoute('profile');
        }

        return $this->render('membre_activite/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
