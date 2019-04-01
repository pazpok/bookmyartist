<?php


namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
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
            ->add('pictureFile', VichImageType::class, ['label' => 'Photo de profil', 'required' => false])
            ->add('firstname', null)
            ->add('lastname', null)
            ->add('email', EmailType::class)
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => ['label' => 'Changer mon mot de passe : '],
                'second_options' => ['label' => 'Répétez votre mot de passe : ']
            ])
            ->add('artistId', null, ['label' => 'Nom d\'artiste', 'attr' => ['class' => 'artist-hide']])
            ->add('type', null, ['attr' => ['class' => 'artist-form artist-hide'], ])
            ->add('genre', null , ['attr' => ['class' => 'genre-select artist-hide']])
            ->add('localisation', null, ['attr' => ['class' => 'artist-hide']])
            ->add('facebook', null, ['attr' => ['class' => 'artist-hide']])
            ->add('twitter', null, ['attr' => ['class' => 'artist-hide']])
            ->add('youtube', null, ['attr' => ['class' => 'artist-hide']])
            ->add('soundcloud', null, ['attr' => ['class' => 'artist-hide']])
            ->add('spotify', null, ['attr' => ['class' => 'artist-hide']])


//            ->add('termsAccepted', CheckboxType::class, [
//                'mapped' => false,
//                'constraints' => new isTrue()
//            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'data-class' => User::class,
            ]);

    }

}