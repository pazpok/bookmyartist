<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Entity\Reservation;
use App\Entity\Template;
use App\Entity\User;
use App\Form\ArtistType;
use App\Form\TemplateChoiceType;
use App\Form\TemplateType;
use App\Form\UserType;
use SpotifyWebAPI\Session;
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
        $user = $this->getUser();
        $templates = $this->getDoctrine()->getRepository(Template::class)->findAll();

        if ($user->isArtist()) {
            $form = $this->createForm(TemplateType::class, $user, ["validation_groups" => "create"]);
//            dump($request);die;
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                return $this->redirectToRoute('app_user');
            }

            return $this->render('templateuser/edit.html.twig', [
                'user' => $user,
                'form' => $form->createView(),
                'templates' => $templates,
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
        $formules = $user->getFormules();
        $comments = $this->getDoctrine()->getRepository(Avis::class)->findBy(['artist' => $user]);

        $session = new Session(
            '82f24e2fac5a4357a4d3140af74f262f',
            '27e23cb55cb74c8d8a7b0d642ba46d31'
//            'http://127.0.0.1:8000/callback'
        );

        $session->requestCredentialsToken();
        $accessToken = $session->getAccessToken();

        $api = new SpotifyWebAPI();
        $api->setAccessToken($accessToken);
        $api->getArtistTopTracks('0Ldjd0Z66CJ0rChWXx0jzB', ["country" => "FR"]);


//        header('Location: ' . $session->getAuthorizeUrl());
//        dump($api);die();


        if ($getTemplate == 1) {
            return $this->render('artist/spotify/show.html.twig',
                ['user' => $user, 'formules' => $formules, 'comments' => $comments, 'data' => $api
                ]);
        } elseif ($getTemplate == 2) {
            return $this->render('artist/youtube/show.html.twig',
                ['user' => $user, 'formules' => $formules, 'comments' => $comments
                ]);
        } elseif ($getTemplate == 3) {
            return $this->render('artist/soundcloud/show.html.twig',
                ['user' => $user, 'formules' => $formules, 'comments' => $comments
                ]);
        } else {
            return $this->render('artist/classique/show.html.twig',
                ['user' => $user, 'formules' => $formules, 'comments' => $comments
                ]);
        }
    }

    /**
     * @Route("/results", name="search", methods="GET")
     */
    public function searchQuery(Request $request)
    {
//        $form = $this->get('form.factory')->create(SearchFilterType::class);

        $uq = $request->get('search-query');

        $users = $this->getDoctrine()->getRepository(User::class);
        if ($uq === null) {
            $users->findAll();
            return $this->render('search/index.html.twig', ['users' => $users]);
        } else {
            $users->searchBy($uq);
            return $this->render('search/index.html.twig', ['users' => $users]);
        }


    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/results", name="search", methods="GET")
     */
    public function filterQuery(Request $request)
    {
        $fq = $request->get('type-filter');
        $lq = $request->get('localisation-filter');
        $gq = $request->get('genre-filter');


        $users = $this->getDoctrine()->getRepository(User::class)->filterBy($fq, $lq, $gq);

        return $this->render('search/index.html.twig', ['users' => $users]);


    }

    /**
     * @Route("/reservation", name="reservation", methods="GET")
     */
    public function reservation(Request $request): Response
    {
        $em = $this->getDoctrine();
        $user = $this->getUser();
        $form = $request->get('formule-resa');

        $reservations = $em->getRepository(Reservation::class)->findBy(['user' => $user]);
        $formules = $user->getFormules();

        return $this->render('reservation/index.html.twig', ['reservations' => $reservations, 'user' => $user, 'formules' => $formules]);
    }

}