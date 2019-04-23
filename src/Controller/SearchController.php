<?php


namespace App\Controller;


use App\Entity\User;
use App\Form\SearchType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends DefaultController
{
    /**
     * @Route("/resultats", name="search")
     */
    public function searchArtist(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(SearchType::class);
        $query = $form->getData();

        $user = $em->getRepository(User::class)->findOneBy(['artistId' => $query]);
        return $this->render('search/index.html.twig', [
            'query' => $query,
            'user' => $user
        ]);
    }

//    public function searchBar(Request $request)
//    {
//        $query = null;
//        $form = $this->createFormBuilder()
//            ->setAction($this->generateUrl('search', array('search' => $query)))
//            ->add('query', TextType::class, ['label' => false, 'attr' => ['placeholder' => 'Rechercher un artiste']])
//            ->add('search', SubmitType::class, [
//                'attr' => [
//                    'class' => 'btn btn-primary'
//                ]
//            ])
//            ->getForm();
//
//        $form->handleRequest($request);
//
//        $query = $form['query']->getData();
//
//        return $this->render('search/searchBar.html.twig', [
//            'form' => $form->createView(),
//            'query' => $query
//        ]);
//
//    }

}