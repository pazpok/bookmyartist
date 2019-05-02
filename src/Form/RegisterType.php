<?php


namespace App\Form;


use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Vich\UploaderBundle\Form\Type\VichImageType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', null, ['attr' => ['class' => 'form-control'] ])
            ->add('lastname', null, ['attr' => ['class' => 'form-control']])
            ->add('email', EmailType::class, ['attr' => ['class' => 'form-control']])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => ['label' => 'Mot de passe : ', 'attr' => ['class' => 'form-control']],
                'second_options' => ['label' => 'Répétez votre mot de passe : ', 'attr' => ['class' => 'form-control']]
            ])
            ->add('termsAccepted', CheckboxType::class, [
                'mapped' => false,
                'constraints' => new isTrue()
            ])
            ->add('save', SubmitType::class, ['label' => 'S\'enregistrer', 'attr' => ['class' => 'btn btn-outline-primary']])
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