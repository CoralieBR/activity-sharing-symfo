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
            $machin = [];
            foreach($membresPotentiels as $membre){
                // dd($membre->getLatitude());
                $latitude1 = $membre->getLatitude();
                $longitude1 = $membre->getLongitude();
                $latitude2 = $groupe->getLatitude();
                $longitude2 = $groupe->getLongitude();
                $unit = 'kilometers';

                // function getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'kilometers') {
                    $theta = $longitude1 - $longitude2; 
                    $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
                    $distance = acos($distance); 
                    $distance = rad2deg($distance); 
                    $distance = $distance * 60 * 1.1515; 
                    switch($unit) { 
                      case 'miles': 
                        break; 
                      case 'kilometers' : 
                        $distance = $distance * 1.609344; 
                    } 
                //     return (round($distance,2)); 
                //   }
                
                if(round($distance,2) <= $membre->getDistancekm()){
                    // Si latLng + distance membre ok
                    // Ajout du membre dans les invités
                    // dd($distance);
                    $groupe->addInvitation($membre);
                    //
                    ($bcc==="") ? $bcc.=$membre->getEmail() : $bcc.=','.$membre->getEmail();
                    // $machin[] = $membre->getPrenom();
                }
                
            }
            // dd($machin);
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
