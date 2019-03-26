<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController
 * @package App\Controller
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/account/{id}", name="app_user")
     */
    public function accompt(User $user)
    {
        return $this->render('user/account.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
