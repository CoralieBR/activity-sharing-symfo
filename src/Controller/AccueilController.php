<?php

namespace App\Controller;

use App\Repository\ArticleAccueilRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(ArticleAccueilRepository $articleAccueilRepository): Response
    {
        $articles = $articleAccueilRepository->findBy(["active"=>1], ["id"=>"DESC"]);
        return $this->render('accueil/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
