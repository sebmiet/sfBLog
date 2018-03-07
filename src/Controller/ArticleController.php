<?php
/**
 * Created by PhpStorm.
 * User: sebmiet
 * Date: 07.03.18
 * Time: 01:02
 */

namespace App\Controller;


use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage()
    {
        return $this->render('article/homepage.html.twig');
    }

    /**
     * @Route("/news/{slug}", name="article_show")
     */
    public function show($slug)
    {
        $comments = [
            'Litwo! Ojczyzno moja! Ty jesteś jak zdrowie. Ile cię trzeba było widzieć wyżółkłych młokosów gadających przez wzgląd na brzeg',
            'Księstwa Warszawskiego gdzie się dowie kto cię trzeba cenić, ten zaszczyt należy. Idąc z daleka pobielane ściany starodawne ogląda',
            'sam na Ojczyzny łono. Tymczasem na siano. w pół godziny tak były świeżo z krzykiem podróżnego barwą spłonęła rumian jak szlachcic obyczaje',
        ];

        // dump($slug, $this);

        return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-', '', $slug)),
            'slug' => $slug,
            'comments' => $comments
        ]);
    }

    /**
     * @Route("/news/{slug}/heart", name="article_toggle-heart", methods={"POST"})
     */
    public function toggleArticleHeart($slug, LoggerInterface $logger)
    {
        //TODO - actually heart/unheart the article

        $logger->info('Article is being hearted');

        return new JsonResponse(['hearts' => rand(5, 100)]);
    }
}