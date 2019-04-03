<?php


namespace App\Form;


use App\Entity\Template;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TemplateChoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('template', null, [
                'class' => Template::class,
                'choice_label' => 'title',
                'expanded' => true,
                'required' => true,
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