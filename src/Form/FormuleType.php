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
            ->add('title', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('description', TextareaType::class, ['attr' => ['class' => 'form-control']])
            ->add('nbMusiciens', IntegerType::class, ['attr' => ['class' => 'form-control']])
            ->add('tpsInstall', TimeType::class, ['attr' => ['class' => 'form-control']])
            ->add('tpsEvent', TimeType::class, ['attr' => ['class' => 'form-control']])
            ->add('price', IntegerType::class, ['attr' => ['class' => 'form-control']])
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