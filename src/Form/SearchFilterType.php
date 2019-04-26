<?php


namespace App\Form;


use App\Entity\Formule;
use App\Entity\User;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type\EntityFilterType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('type', EntityFilterType::class, [
                'class' => User::class,

                'label' => 'Type :',
                'choice_label' => 'type',
                'choice_value' => 'type',
                'attr' => [
                    'class' => 'm-2'
                ]
            ])
//            ->add('genre', EntityFilterType::class, [
//                'class' => User::class,
//                'choice_label' => 'genre',
//                'choice_value' => 'genre',
//            ])
            ->add('localisation', EntityFilterType::class, [
                'class' => User::class,
                'label' => 'Localisation :',
                'choice_label' => 'localisation',
                'choice_value' => 'localisation',
                'attr' => [
                    'class' => 'm-2'
                ]
            ])
            ->add('price', EntityFilterType::class, [
                'class' => Formule::class,
                'label' => 'Prix :',
                'choice_label' => 'price',
                'choice_value' => 'price',
                'attr' => [
                    'class' => 'm-2'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'data_class' => User::class,
                'validation_groups' => ['filtering'],
            ]);

    }

}