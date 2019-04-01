<?php


namespace App\Form;


use App\Entity\Template;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class TemplateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add('templateTitle', null, ['label' => 'Titre : '])
            ->add('templateImageFile', VichImageType::class, ['label' => 'Image template : ', 'required' => false])
            ->add('templateDescription', null, ['label' => 'Description : '])
            ->add('plainPassword', PasswordType::class, ['label' => 'Mot de passe'])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'data-class' => Template::class,
            ]);

    }

}