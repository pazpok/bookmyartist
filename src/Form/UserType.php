<?php


namespace App\Form;


use App\Entity\User;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('isArtist', CheckboxType::class, ['label' => 'Mode artiste', 'required' => false])
            ->add('pseudo', TextType::class, ['required' => false])
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('email', EmailType::class)
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => ['label' => 'Mot de passe : '],
                'second_options' => ['label' => 'Répétez votre mot de passe : ']
            ])
            ->add('type', EntityType::class, [
                'class' => User::class,
                'choices' => [
                    'dj' => 'DJ',
                    'groupe'=> 'Groupe"'
                ],
            ])
            ->add('genre', null, ['attr' => ['class' => 'genre-select']])


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