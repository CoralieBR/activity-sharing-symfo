<?php

namespace App\Controller;


use App\Entity\Membre;
use App\Form\InscriptionType;
use App\Form\MembreType;
use App\Repository\MembreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class MembreController extends AbstractController
{


// **************** Inscription ***************************//

    /**
     * @Route("/inscription", name="inscription", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $membre = new Membre();
        $form = $this->createForm(InscriptionType::class, $membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($membre);
            $entityManager->flush();

            return $this->redirectToRoute('profile');
        }

        return $this->render('membre/inscription.html.twig', [
            'membre' => $membre,
            'form' => $form->createView(),
        ]);
    }




// **************** Interface pour membre ***************************//

    /**
     * @Route("/profile", name="profile")
     */
    public function profile(): Response
    {
        return $this->render('membre/profile.html.twig');
    }

    /**
     * @Route("/profile/modifier", name="profile_modifier")
     */
    public function profileModifier(Request $request, UserPasswordEncoderInterface $encoder, SessionInterface $session): Response
    {
        // Mise en place du formaulaire d'après les informations de l'utilisateur connecté
        $user = $this->getUser();
        if(empty($session->get('password'))){
            $session->set('password', $user->getPassword());
        }
        $form = $this->createForm(UserCompteType::class, $user);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if(is_null($user->getPassword())){
                // on récupère le mdp acturl dans la bdd
                // $userRepo = $this->getDoctrine()->getManager()->getRepository(User::class);
                // $refUser = $userRepo->find($user->getId());
                $user->setPassword($session->get('password'));
            } else {
                $plainPassword = $user->getPassword();
                $encodedPassword = $encoder->encodePassword($user, $plainPassword);
                $user->setPassword($encodedPassword);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            
            $this->addFlash("success", "Vos informations ont bien été mises à jour");

            // $this->getDoctrine()->getManager()->flush();
            // return $this->redirectToRoute('inscription_index');
        }

        return $this->render('user/compte.html.twig', ['form' => $form->createView()]);
    }




// **************** Interface pour admin ***************************//

    /**
     * @Route("/admin/membre/", name="membre_index", methods={"GET"})
     */
    public function index(MembreRepository $membreRepository): Response
    {
        return $this->render('membre/index.html.twig', [
            'membres' => $membreRepository->findAll(),
        ]);
    }


    /**
     * @Route("/{id}", name="membre_show", methods={"GET"})
     */
    public function show(Membre $membre): Response
    {
        return $this->render('membre/show.html.twig', [
            'membre' => $membre,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="membre_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Membre $membre): Response
    {
        $form = $this->createForm(MembreType::class, $membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('membre_index');
        }

        return $this->render('membre/edit.html.twig', [
            'membre' => $membre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="membre_delete", methods={"POST"})
     */
    public function delete(Request $request, Membre $membre): Response
    {
        if ($this->isCsrfTokenValid('delete'.$membre->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($membre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('membre_index');
    }
}
