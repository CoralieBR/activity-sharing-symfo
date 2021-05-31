<?php

namespace App\Controller;

use App\Entity\Groupe;
use App\Form\GroupeType;
use App\Repository\GroupeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// /**
//  * @Route("/groupe")
//  */
class GroupeController extends AbstractController
{
    // ====================================================== //
    // =============== INTERFACE SUPER_MEMBRE =============== //
    // ====================================================== //

    /**
     * @Route("profile/groupe/new", name="groupe_new", methods={"GET","POST"})
     */
    public function new(Request $request, GroupeRepository $groupeRepository): Response
    {
        $groupe = new Groupe();
        $form = $this->createForm(GroupeType::class, $groupe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            // 
            $membresPotentiels = $groupeRepository->findGroupeMembres($groupe->getJour(),$groupe->getHeureDebut(),$groupe->getHeureFin(),$groupe->getActivite());
            //dd($membresPotentiels);
            $bcc="";
            foreach($membresPotentiels as $membre){
                dd($membre->getLatitude());
                // Si latLng + distance membre ok
                // Ajout du membre dans les invités
                $groupe->addInvitation($membre);
                //
                ($bcc==="") ? $bcc.=$membre->getEmail() : $bcc.=','.$membre->getEmail();

            }
            
            //
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($groupe);
            $entityManager->flush();

            return $this->redirectToRoute('profile');
        }

        return $this->render('groupe/new.html.twig', [
            'groupe' => $groupe,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("profile/groupe/{id}/edit", name="groupe_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Groupe $groupe): Response
    {
        $form = $this->createForm(Groupe1Type::class, $groupe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('profile');
        }

        return $this->render('groupe/edit.html.twig', [
            'groupe' => $groupe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("profile/groupe/{id}", name="groupe_delete", methods={"POST"})
     */
    public function delete(Request $request, Groupe $groupe): Response
    {
        if ($this->isCsrfTokenValid('delete'.$groupe->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($groupe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('profile');
    }



    // ====================================================== //
    // =================== INTERFACE ADMIN ================== //
    // ====================================================== //

    /**
     * @Route("/admin/groupe", name="groupe_index", methods={"GET"})
     */
    public function index(GroupeRepository $groupeRepository): Response
    {
        // return new Response("coucou");
        return $this->render('groupe/index.html.twig', [
            'groupes' => $groupeRepository->findAll(),
        ]);
    }

    
    /**
     * @Route("/admin/groupe/{id}", name="groupe_show", methods={"GET"})
     */
    public function show(Groupe $groupe): Response
    {
        return $this->render('groupe/show.html.twig', [
            'groupe' => $groupe,
        ]);
    }

    
    
}
