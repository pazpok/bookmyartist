<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController
 * @package App\Controller
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/{id}", name="app_user")
     */
    public function accompt(User $user)
    {
        return $this->render('user/account.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}", name="app_user", methods="GET|POST")
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_user', ['id' => $user->getId()]);
        }


        return $this->render('user/account.html.twig', [
            'user' => $user,
            'form' => $form->createView()
        ]);
    }
}
