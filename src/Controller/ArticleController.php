<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    /**
     * @Route(path = "/article", name = "article_list")
     * @return Response
     */
    public function index(): Response
    {
        $articles = [
            ['title' => 'Article 1', 'content' => 'Lorem article 1', 'id' => 1],
            ['title' => 'Article 2', 'content' => 'Lorem article 2', 'id' => 2],
            ['title' => 'Article 3', 'content' => 'Lorem article 3', 'id' => 3],
        ];

        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route(path = "/article/{id}", name = "article_show")
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        // Simule une connexion à la base
        $article = [
            'title'   => 'Mon premier article',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae cupiditate dolore fugit, itaque numquam pariatur placeat similique! Debitis, eligendi excepturi facilis incidunt inventore ipsam itaque nam omnis, qui rem voluptas.',
        ];

        return $this->render('articles/show.html.twig', [
            'article' => $article,
        ]);
    }
}
