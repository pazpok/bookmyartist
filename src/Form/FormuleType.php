<?php


namespace App\Form;


use App\Entity\Formule;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormuleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Titre :','attr' => ['class' => 'form-control']])
            ->add('description', TextareaType::class, ['label' => 'Description','attr' => ['class' => 'form-control']])
            ->add('nbMusiciens', IntegerType::class, ['label' => 'Nombre de musiciens','attr' => ['class' => 'form-control']])
            ->add('tpsInstall', TimeType::class, ['label' => 'Temps installation','attr' => ['class' => 'form-control']])
            ->add('tpsEvent', TimeType::class, ['label' => 'Temps évènement','attr' => ['class' => 'form-control']])
            ->add('price', IntegerType::class, ['label' => 'Prix','attr' => ['class' => 'form-control']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'data_class' => Formule::class,
            ]);

    }

}