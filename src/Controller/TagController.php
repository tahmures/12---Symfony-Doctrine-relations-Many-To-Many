<?php

namespace App\Controller;
use App\Entity\Article;
use App\Entity\Tag;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TagController extends AbstractController
{
    /**
     * @Route("tag/{name}", name="show_articles_tag")
     */
    public function showByCategory(Tag $tag)
    {
        $articles = $tag->getArticles();

        return $this->render('tag/index.html.twig', [
            'tag' => $tag,
            'articles' => $articles
        ]);
    }
}
