<?php

namespace App\Controller;

use App\Entity\Template;
use App\Entity\User;
use App\Form\ArtistType;
use App\Form\TemplateChoiceType;
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
     * @Route("/user", name="app_user")
     */
    public function accompt(Request $request)
    {
//        $this->denyAccessUnlessGranted('ROLE_USER', null, 'Unable to access this page!');
        $user = $this->getUser();
        $templates = $this->getDoctrine()->getRepository(Template::class)->findAll();

        if ($this->getUser()->isArtist()) {
            $form = $this->createForm(ArtistType::class, $user);
            $form->handleRequest($request);
            $tform = $this->createForm(
                TemplateChoiceType::class,
                $user,
                ['action' => $this->generateUrl('app_user_template')]
            );
            $tform->handleRequest($request);
        } else {
            $form = $this->createForm(UserType::class, $user);
            $form->handleRequest($request);
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_user');
        }

        if ($this->getUser()->isArtist()) {
            return $this->render('user/account.html.twig', [
                'user' => $user,
                'form' => $form->createView(),
                'tform' => $tform->createView(),
                'templates' => $templates
            ]);
        }

        return $this->render('user/account.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
            'templates' => $templates
        ]);


    }

    /**
     * @Route("/user/template", name="app_user_template")
     */
    public function templateEdit(Request $request)
    {
        $templates = $this->getDoctrine()->getRepository(Template::class)->findAll();

        if ($this->getUser()->getId() === $this->getUser()->getId()) {
            $form = $this->createForm(TemplateType::class, $this->getUser());
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('app_user', ['id' => $this->getUser()->getId()]);
            }

            return $this->render('templateuser/edit.html.twig', [
                'user' => $this->getUser(),
                'form' => $form->createView(),
                'templates' => $templates
            ]);

        } else {
            return new RedirectResponse('/', 301);
        }


    }

    /**
     * @param User $user
     * @Route("/artist/{artistId}", name="artist_show", methods="GET")
     * @return Response
     */
    public function artistShow(User $user): Response
    {
        return $this->render('artist/show.html.twig',
            ['user' => $user
        ]);
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
