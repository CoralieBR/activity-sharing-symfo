<?php

namespace App\Controller;

use App\Entity\ActiviteCategorie;
use App\Form\ActiviteCategorieType;
use App\Repository\ActiviteCategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/categorie")
 */
class ActiviteCategorieController extends AbstractController
{
    /**
     * @Route("/", name="activite_categorie_index", methods={"GET"})
     */
    public function index(ActiviteCategorieRepository $activiteCategorieRepository): Response
    {
        return $this->render('activite_categorie/index.html.twig', [
            'activite_categories' => $activiteCategorieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="activite_categorie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $activiteCategorie = new ActiviteCategorie();
        $form = $this->createForm(ActiviteCategorieType::class, $activiteCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($activiteCategorie);
            $entityManager->flush();

            return $this->redirectToRoute('activite_categorie_index');
        }

        return $this->render('activite_categorie/new.html.twig', [
            'activite_categorie' => $activiteCategorie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="activite_categorie_show", methods={"GET"})
     */
    public function show(ActiviteCategorie $activiteCategorie): Response
    {
        return $this->render('activite_categorie/show.html.twig', [
            'activite_categorie' => $activiteCategorie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="activite_categorie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ActiviteCategorie $activiteCategorie): Response
    {
        $form = $this->createForm(ActiviteCategorieType::class, $activiteCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('activite_categorie_index');
        }

        return $this->render('activite_categorie/edit.html.twig', [
            'activite_categorie' => $activiteCategorie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="activite_categorie_delete", methods={"POST"})
     */
    public function delete(Request $request, ActiviteCategorie $activiteCategorie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$activiteCategorie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($activiteCategorie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('activite_categorie_index');
    }
}
