<?php

namespace App\Controller\homepage;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */
    public function index()
    {
        $arrayTwitterHref = [
            'https://twitter.com/ActionLogement?ref_src=twsrc%5Etfw',
            'https://twitter.com/Caf_Yvelines?ref_src=twsrc%5Etfw',
            'https://twitter.com/ameli_actu?ref_src=twsrc%5Etfw'
        ];

        $arrayTwitterLabel = [
            'Tweets by ActionLogement',
            'Tweets by Caf_Yvelines',
            'Tweets by ameli_actu'
        ];

        $key = rand(0,2);

        return $this->render('homepage/homepage.html.twig',[
            'hrefGenerated' => $arrayTwitterHref[$key],
            'labelGenerated' => $arrayTwitterLabel[$key]
        ]);
    }

}
