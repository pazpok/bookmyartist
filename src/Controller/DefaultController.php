<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Entity\Type;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage()
    {
        $em = $this->getDoctrine();
        $users = $em->getRepository(User::class)->findAll();
        $types = $em->getRepository(Type::class)->findAll();
        $genres = $em->getRepository(Genre::class)->findAll();

        return $this->render('default/homepage.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => $users,
            'types' => $types,
            'genres' => $genres,
        ]);
    }


}
