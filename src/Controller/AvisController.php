<?php


namespace App\Controller;

use App\Entity\Avis;
use App\Entity\User;
use App\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/avis")
 */
class AvisController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="avis_index", methods="GET")
     */
    public function index(): Response
    {
        $avis = $this->getDoctrine()->getRepository(Avis::class)->findAll();

        return $this->render('avis/index.html.twig', ['avis' => $avis]);

    }

    /**
     * @Route("/new/{id}", name="avis_new", methods="GET|POST")
     */
    public function new(User $user, Request $request): Response
    {
        $comment = new Avis();
        $comment->setUser($this->getUser());
        $comment->setArtist($user);

        $form = $this->createForm(CommentType::class, $comment, [
            'action' => $this->generateUrl('avis_new', ['id' => $user->getId()])
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('artist_show', ['artistId' => $user->getArtistId()]);
        }

        return $this->render('avis/new.html.twig', [
            'comment' => $comment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="avis_show", methods="GET")
     */
    public function show(Avis $avis): Response
    {
        return $this->render('avis/show.html.twig', ['comment' => $avis]);
    }

    /**
     * @Route("/{id}/edit", name="avis_edit", methods="GET|POST")
     */
    public function edit(Request $request, Avis $avis): Response
    {
        $form = $this->createForm(CommentType::class, $avis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('avis_index', ['id' => $avis->getId()]);
        }

        return $this->render('avis/edit.html.twig', [
            'avis' => $avis,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="avis_delete", methods="DELETE")
     */
    public function delete(Request $request, Avis $avis): Response
    {
        if ($this->isCsrfTokenValid('delete'.$avis->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($avis);
            $em->flush();
        }

        return $this->redirectToRoute('avis_index');
    }

}