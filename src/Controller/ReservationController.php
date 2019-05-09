<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ReservationController extends AbstractController
{

    public function calendar(): Response
    {
        return $this->render('reservation/calendar.html.twig');
    }


}