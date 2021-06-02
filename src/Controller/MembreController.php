<?php

namespace App\Controller;


use App\Entity\Membre;
use App\Entity\Pote;
use App\Form\InscriptionType;
use App\Form\MembreType;
use App\Form\SuperMembreType;
use App\Repository\GroupeRepository;
use App\Repository\MembreRepository;
use App\Repository\PoteRepository;
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
    public function new(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $membre = new Membre();
        $form = $this->createForm(InscriptionType::class, $membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $membre->setRoles(['ROLE_USER']);
            $originPassword = $membre->getPassword();
            $encodedPassword = $encoder->encodePassword($membre, $originPassword);
            $membre->setPassword($encodedPassword);

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
    public function profile(PoteRepository $poteRepository): Response
    {
        $today = new \DateTime('now');
        $membre = $this->getUser();

        // $invitations = $this->getUser()->getInvitations();
        // // dd($today);
        // foreach ($invitations as $invitation) {
        //     $date = $invitation->getDate();
        //     if ($date <= $today) {
        //         $invitation->removeInvitation($membre);
                
        //         $entityManager = $this->getDoctrine()->getManager();
        //         $entityManager->persist($invitation);
        //         $entityManager->flush();
        //     } 
        // }

        $groupes = $this->getUser()->getGroupes();
        // dd($groupes);
        foreach ($groupes as $groupe) {
            $date = $groupe->getDate();
            if ($date <= $today) {
                $relations = $groupe->getMembres();
                foreach ($relations as $relation) {
                    $relationExiste = $poteRepository->findBy([
                        'membre' => $membre,
                        'pote' => $relation,
                    ]);
                    if(count($relationExiste) == 0 && $membre != $relation){
                        $pote = new Pote;
                        
                        $pote->setMembre($membre);
                        $pote->setPote($relation);
                        $pote->setAccepte(0);

                        $entityManager = $this->getDoctrine()->getManager();
                        $entityManager->persist($pote);
                        $entityManager->flush();
                    } 
                    
                }

                $groupe->removeMembre($membre);
                
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($groupe);
                $entityManager->flush();
            } 
        }
        
        $poto = $poteRepository->findBy([
            'membre' => $membre,
            'accepte' => 0,
        ]);
        $potoTruc = $poteRepository->findBy([
            'pote' => $membre,
            'accepte' => 1,
        ]);
        
        // $potes = $this->getUser()->getPoteDemandes();
        // $poto = [];
        // foreach($potes as $pote){
        //     $poto[] = $pote->getPote();
        // }

        return $this->render('membre/profile.html.twig', [
            'poto' => $poto,
            'potoTruc' => $potoTruc,
        ]);
    }

    /**
     *  @Route("/profile/accepte-pote/{id}", name="accepte_pote")
     */
    public function accepte($id, PoteRepository $poteRepository, MembreRepository $membreRepository)
    {
        $membre = $this->getUser();
        $poteId = base64_decode($id);

        // On récupère la ligne dans "pote" où le membre connecté est 'membre' et on y change accepte
        $pote = $poteRepository->findOneBy([
            'membre' => $membre,
            'pote' => $poteId,
        ]);
        $pote->setAccepte(1);
        
        $poteComplet = $membreRepository->find($poteId);

        $nvPote = new Pote;
        $nvPote->setMembre($poteComplet);
        $nvPote->setPote($membre);
        $nvPote->setAccepte(0);


        $em = $this->getDoctrine()->getManager();
        $em->persist($pote);
        $em->persist($nvPote);
        $em->flush();

        return $this->redirectToRoute('profile');
    }

    /**
     *  @Route("/profile/refuse-pote/{id}", name="refuse_pote")
     */
    public function refusePote($id, PoteRepository $poteRepository, MembreRepository $membreRepository)
    {
        $membre = $this->getUser();
        $poteId = base64_decode($id);

        $pote = $poteRepository->findOneBy([
            'membre' => $membre,
            'pote' => $poteId,
            'accepte' => 0,
        ]);
        // dd($pote);
        // dump($membre->getPoteDemandes());
        // $membre->removePoteDemande($pote);
        // print_r($membre->getPoteDemandes());
        // foreach($membre->getPoteDemandes() as $m){
        //     dump($m);
        // }
        // // $pote = $membreRepository->find($poteId);
        // $membre->removePoteDemande($pote);

        $em = $this->getDoctrine()->getManager();
        $em->remove($pote);
        $em->flush();

        return $this->redirectToRoute('profile');
    }

    /**
     * @Route("/profile/modifier", name="profile_modifier")
     */
    public function profileModifier(Request $request, UserPasswordEncoderInterface $encoder, SessionInterface $session): Response
    {
        // Mise en place du formulaire d'après les informations de l'utilisateur connecté
        $user = $this->getUser();
        if(empty($session->get('password'))){
            $session->set('password', $user->getPassword());
        }
        $form = $this->createForm(InscriptionType::class, $user);
        
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
            
            return $this->redirectToRoute('profile');

            // $this->getDoctrine()->getManager()->flush();
            // return $this->redirectToRoute('inscription_index');
        }

        return $this->render('membre/profile-modifier.html.twig', ['form' => $form->createView()]);
    }


    /**
     * @Route("profile/accept-invitation/{id}", name="accept_invitation", methods={"GET"})
     */
    public function accept($id, GroupeRepository $groupeRepository): Response
    {
        $finalId = base64_decode($id);
        $groupe = $groupeRepository->find($finalId);
        $membre = $this->getUser();
        $groupe->addMembre($membre);
        $groupe->removeInvitation($membre);
        $em = $this->getDoctrine()->getManager();
        $em->persist($groupe);
        $em->flush();
        // On est sur la page profile, en bas d'une carte invitation. On clique sur "accepter" pour accepter l'invitation
        // Sans que ça ne se voit, en cliquant sur le lien ça nous envoie sur une page qui va récupérer notre id (session) et celui de groupe de l'invitation (get) pour les ajouter ensemble dans la table relationnelle. Puis nous renvoit sur la page profil, donc on ne s'est rendu compte de rien.
        return $this->redirectToRoute('profile');
    }

    /**
     * @Route("profile/refuse-invitation/{id}", name="refuse_invitation")
     */
    public function refuse($id, GroupeRepository $groupeRepository): Response
    {
        $finalId = base64_decode($id);
        $groupe = $groupeRepository->find($finalId);
        $membre = $this->getUser();
        $groupe->removeInvitation($membre);
        $em = $this->getDoctrine()->getManager();
        $em->persist($groupe);
        $em->flush();
        return $this->redirectToRoute('profile');
    }

    /**
     * @Route("/profile/membre/{id}", name="membre_delete", methods={"POST"})
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
     * @Route("/admin/membre/{id}", name="membre_show", methods={"GET"})
     */
    public function show(Membre $membre): Response
    {
        return $this->render('membre/show.html.twig', [
            'membre' => $membre,
        ]);
    }

    /**
     * @Route("/admin/membre/{id}/edit", name="membre_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Membre $membre): Response
    {
        $form = $this->createForm(SuperMembreType::class, $membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $membre = $form->getData();
            if($membre->getRole()=="ROLE_SUPER_USER"){
                $membre->setRoles( ['ROLE_USER', 'ROLE_SUPER_USER']);
            }else{
                $membre->setRoles( ['ROLE_USER']);
            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($membre);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('membre_index');
        }

        return $this->render('membre/edit.html.twig', [
            'membre' => $membre,
            'form' => $form->createView(),
        ]);
    }

    
}
