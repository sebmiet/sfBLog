<?php
/**
 * Created by PhpStorm.
 * User: sebmiet
 * Date: 07.03.18
 * Time: 01:02
 */

namespace App\Controller;



use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('OMG! My first page already! Wooo!');
    }

    /**
     * @Route("/news/{slug}")
     */
    public function show($slug)
    {
        $comments = [
            'Litwo! Ojczyzno moja! Ty jesteś jak zdrowie. Ile cię trzeba było widzieć wyżółkłych młokosów gadających przez wzgląd na brzeg',
            'Księstwa Warszawskiego gdzie się dowie kto cię trzeba cenić, ten zaszczyt należy. Idąc z daleka pobielane ściany starodawne ogląda',
            'sam na Ojczyzny łono. Tymczasem na siano. w pół godziny tak były świeżo z krzykiem podróżnego barwą spłonęła rumian jak szlachcic obyczaje',
        ];

        return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-', '', $slug)),
            'comments' => $comments
        ]);
    }
}