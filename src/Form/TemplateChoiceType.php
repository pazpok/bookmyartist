<?php


namespace App\Form;


use App\Entity\Template;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
                'label' => false,
            ])
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