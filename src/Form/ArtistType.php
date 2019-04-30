<?php


namespace App\Form;

use App\Entity\Formule;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;


class ArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('isArtist', CheckboxType::class, ['label' => 'Mode artiste', 'required' => false])
            ->add('pseudo', null, ['required' => false])
            ->add('pictureFile', VichImageType::class, ['label' => 'Photo de profil', 'required' => false, 'empty_data' => false])
            ->add('firstname', null)
            ->add('lastname', null)
            ->add('email', EmailType::class)
            ->add('artistId', null, ['label' => 'Nom d\'artiste', 'required' => true])
            ->add('type', null)
            ->add('genre', null, ['attr' => ['class' => 'genre-select']])
            ->add('localisation', null)
            ->add('facebook', null)
            ->add('twitter', null)
            ->add('youtube', null)
            ->add('soundcloud', null)
            ->add('spotify', null)
            ->add('spotifyId', null, ['help' => 'Où trouver mon id Spotify ?', 'attr' => ['class' => 'spotify-id']])
            ->add('soundcloudId', null, ['help' => 'Où trouver mon id Soundcloud ?', 'attr' => ['class' => 'soundcloud-id']])
            ->add('youtubeId', null, ['help' => 'Où trouver mon id Youtube ?', 'attr' => ['class' => 'youtube-id']])

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