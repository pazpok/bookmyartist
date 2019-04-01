<?php

namespace App\Controller;

use App\Entity\Template;
use App\Entity\User;
use App\Form\ArtistType;
use App\Form\TemplateType;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController
 * @package App\Controller
 */
class UserController extends AbstractController
{
    /**
     * @Route("/user/{id}", name="app_user")
     */
    public function accompt(Request $request,User $user)
    {
        $templates = $this->getDoctrine()->getRepository(Template::class)->findAll();

        if ($this->getUser()->getId() === $user->getId()) {

            if ($this->getUser()->isArtist()) {
                $form = $this->createForm(ArtistType::class, $user);
                $form->handleRequest($request);
            } else {
                $form = $this->createForm(UserType::class, $user);
                $form->handleRequest($request);
            }

            if ($form->isSubmitted() && $form->isValid()) {
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('app_user', ['id' => $user->getId()]);
            }
            return $this->render('user/account.html.twig', [
                'user' => $user,
                'form' => $form->createView(),
                'templates' => $templates
            ]);
        } else {
            return new RedirectResponse('/', 301);
        }


    }

    /**
     * @Route("/user/{id}/template/{title}", name="app_user_template")
     */
    public function templateEdit(Request $request, User $user)
    {
        $templates = $this->getDoctrine()->getRepository(Template::class)->findAll();

        if ($this->getUser()->getId() === $user->getId()) {
            $form = $this->createForm(TemplateType::class, $user);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('app_user', ['id' => $user->getId()]);
            }

            return $this->render('templateuser/edit.html.twig', [
                'user' => $user,
                'form' => $form->createView(),
                'templates' => $templates
            ]);

        } else {
            return new RedirectResponse('/', 301);
        }


    }

//    /**
//     * @Route("/user/{id}", name="app_user", methods="GET|POST")
//     */
//    public function edit(Request $request, User $user): Response
//    {
//        $form = $this->createForm(UserType::class, $user);
//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid()) {
//            $this->getDoctrine()->getManager()->flush();
//
//            return $this->redirectToRoute('app_user', ['id' => $user->getId()]);
//        }
//
//
//        return $this->render('user/account.html.twig', [
//            'user' => $user,
//            'form' => $form->createView()
//        ]);
//    }
}
