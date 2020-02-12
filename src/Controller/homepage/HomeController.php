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
            'https://twitter.com/ameli_actu?ref_src=twsrc%5Etfw',
            'https://twitter.com/ajplusfrancais?ref_src=twsrc%5Etfw',
            'https://twitter.com/78actu?ref_src=twsrc%5Etfw',
        ];

        $arrayTwitterLabel = [
            'Tweets by ActionLogement',
            'Tweets by Caf_Yvelines',
            'Tweets by ameli_actu',
            'Tweets by ajplusfrancais',
            'Tweets by 78actu',
        ];

        $dayOfWeek = rand(0,4);

        return $this->render('homepage/homepage.html.twig',[
            'hrefGenerated' => $arrayTwitterHref[$dayOfWeek],
            'labelGenerated' => $arrayTwitterLabel[$dayOfWeek]
        ]);
    }

}
