<?php

namespace App\Controller;


use App\Repository\ArticleRepository;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ArticleRepository $articleRepository, CategorieRepository $categorieRepository): Response
    {
        return $this->render('home/home.html.twig', [
            'articles'=>$articleRepository->findAll(),
            'categories'=>$categorieRepository->findAll(),
        ]);
    }


}
