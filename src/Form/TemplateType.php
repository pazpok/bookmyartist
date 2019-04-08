<?php


namespace App\Form;


use App\Entity\Formule;
use App\Entity\Template;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
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
            ->add('formules', CollectionType::class, [
                'entry_type' => FormuleType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false
            ])

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