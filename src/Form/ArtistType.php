<?php


namespace App\Form;

use App\Entity\Formule;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;


class ArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('isArtist', CheckboxType::class, ['label' => 'Mode artiste activé', 'required' => false, 'attr' => ['class' => 'switch_1']])
            ->add('pseudo', null, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('pictureFile', VichImageType::class, ['label' => 'Photo de profil', 'required' => false, 'empty_data' => false, 'attr' => ['class' => 'btn btn-outline-primary']])
            ->add('firstname', null, ['label' => 'Prénom','attr' => ['class' => 'form-control'] ])
            ->add('lastname', null, ['label' => 'Nom','attr' => ['class' => 'form-control'] ])
            ->add('email', EmailType::class, ['attr' => ['class' => 'form-control']])
            ->add('artistId', null, ['label' => 'Nom d\'artiste', 'required' => true, 'attr' => ['class' => 'form-control']])
            ->add('type', null, ['attr' => ['class' => 'form-control'] ])
            ->add('genre', null, ['attr' => ['class' => 'genre-select']])
            ->add('localisation', null, ['attr' => ['class' => 'form-control'] ])
            ->add('facebook', null, ['attr' => ['class' => 'form-control'] ])
            ->add('twitter', null, ['attr' => ['class' => 'form-control'] ])
            ->add('youtube', null, ['attr' => ['class' => 'form-control'] ])
            ->add('soundcloud', null, ['attr' => ['class' => 'form-control'] ])
            ->add('spotify', null, ['attr' => ['class' => 'form-control'] ])
            ->add('spotifyId', null, ['help' => 'Où trouver mon id Spotify ?', 'attr' => ['class' => 'spotify-id form-control']])
            ->add('soundcloudId', null, ['help' => 'Où trouver mon id Soundcloud ?', 'attr' => ['class' => 'soundcloud-id form-control']])
            ->add('youtubeId', null, ['help' => 'Où trouver mon id Youtube ?', 'attr' => ['class' => 'youtube-id form-control']])
            ->add('save', SubmitType::class, ['label' => 'Mettre à jour', 'attr' => ['class' => 'btn btn-outline-primary form-control']])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'data_class' => User::class,
            ]);

    }

}