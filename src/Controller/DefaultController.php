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
            'users' => $users,
            'types' => $types,
            'genres' => $genres,
        ]);
    }

    /**
     * @Route("/info", name="info")
     */
    public function bmaInfo()
    {
        return $this->render('default/bmainfo.html.twig');
    }

    /**
     * @Route("/mentions-legales", name="mentionslegales")
     */
    public function mentionsLegales()
    {
        return $this->render('default/mentionslegales.html.twig');
    }

    /**
     * @Route("/cgu-cgv", name="cgucgv")
     */
    public function cgucgv()
    {
        return $this->render('default/cgucgv.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('default/contact.html.twig');
    }

}
