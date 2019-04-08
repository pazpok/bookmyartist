<?php

namespace App\Controller;

use App\Entity\Formule;
use App\Entity\Template;
use App\Entity\User;
use App\Form\ArtistType;
use App\Form\FormuleType;
use App\Form\TemplateChoiceType;
use App\Form\TemplateType;
use App\Form\UserType;
use SpotifyWebAPI\SpotifyWebAPI;
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
            $form = $this->createForm(ArtistType::class, $user, ["validation_groups" => "create"]);
            $form->handleRequest($request);
        } else {
            $form = $this->createForm(UserType::class, $user);
            $form->handleRequest($request);
        }

        $tform = $this->createForm(TemplateChoiceType::class, $user, ["validation_groups" => "create"]);
        $tform->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_user');
        }
        if ($tform->isSubmitted() && $tform->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_user_template');
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
        $formules = new Formule();


        if ($this->getUser()->isArtist()) {
            $form = $this->createForm(TemplateType::class, $this->getUser(), ["validation_groups" => "create"]);
            $form->handleRequest($request);
            $fform = $this->createForm(FormuleType::class, $formules);
            $fform->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('app_user', ['id' => $this->getUser()->getId()]);
            }

            if ($fform->isSubmitted() && $fform->isValid()) {
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('app_user_template', ['id' => $this->getUser()->getId()]);
            }

            return $this->render('templateuser/edit.html.twig', [
                'user' => $this->getUser(),
                'form' => $form->createView(),
                'templates' => $templates,
                'fform' => $fform->createView(),
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
        $getTemplate = $user->getTemplate()->getId();

        if ($getTemplate == 1) {
            return $this->render('artist/spotify/show.html.twig',
                ['user' => $user
                ]);
        } elseif ($getTemplate == 2) {
            return $this->render('artist/youtube/show.html.twig',
                ['user' => $user
                ]);
        } elseif ($getTemplate == 3) {
            return $this->render('artist/soundcloud/show.html.twig',
                ['user' => $user
                ]);
        } else {
            return $this->render('artist/classique/show.html.twig',
                ['user' => $user
                ]);
        }
    }
}