<?php


namespace App\Form;


use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class TemplateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add('templateTitle', null, ['label' => 'Titre : '])
            ->add('templateImageFile', VichImageType::class, ['label' => 'Image template : ', 'required' => false, 'attr' => ['class' => 'form-control-file']])
            ->add('templateDescription', null, ['label' => 'Description : '])
            ->add('formules', CollectionType::class, [
                'entry_type' => FormuleType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'prototype' => true,
                'by_reference' => false,
            ])
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