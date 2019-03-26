<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ArtistController
 * @package App\Controller
 * @Route("/artiste")
 */
class ArtistController extends AbstractController
{
    /**
     * @Route("/show/{pseudo}", name="artist")
     */
    public function index()
    {
        return $this->render('artist/index.html.twig', [
            'controller_name' => 'ArtistController',
        ]);
    }
}
