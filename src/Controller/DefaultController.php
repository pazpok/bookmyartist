<?php

namespace App\Controller;

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
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        $types = $this->getDoctrine()->getRepository(Type::class)->findAll();

        return $this->render('default/homepage.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => $users,
            'types' => $types,
        ]);
    }


}
