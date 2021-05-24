<?php

namespace App\Controller;

use App\Entity\ArticleAccueil;
use App\Form\ArticleAccueilType;
use App\Repository\ArticleAccueilRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/article")
 */
class ArticleAccueilController extends AbstractController
{
    /**
     * @Route("/", name="article_accueil_index", methods={"GET"})
     */
    public function index(ArticleAccueilRepository $articleAccueilRepository): Response
    {
        
        return $this->render('article_accueil/index.html.twig', [
            'article_accueils' => $articleAccueilRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="article_accueil_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $articleAccueil = new ArticleAccueil();
        $form = $this->createForm(ArticleAccueilType::class, $articleAccueil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($articleAccueil);
            $entityManager->flush();

            return $this->redirectToRoute('article_accueil_index');
        }

        return $this->render('article_accueil/new.html.twig', [
            'article_accueil' => $articleAccueil,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="article_accueil_show", methods={"GET"})
     */
    public function show(ArticleAccueil $articleAccueil): Response
    {
        return $this->render('article_accueil/show.html.twig', [
            'article_accueil' => $articleAccueil,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="article_accueil_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ArticleAccueil $articleAccueil): Response
    {
        $form = $this->createForm(ArticleAccueilType::class, $articleAccueil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('article_accueil_index');
        }

        return $this->render('article_accueil/edit.html.twig', [
            'article_accueil' => $articleAccueil,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="article_accueil_delete", methods={"POST"})
     */
    public function delete(Request $request, ArticleAccueil $articleAccueil): Response
    {
        if ($this->isCsrfTokenValid('delete'.$articleAccueil->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($articleAccueil);
            $entityManager->flush();
        }

        return $this->redirectToRoute('article_accueil_index');
    }
}
