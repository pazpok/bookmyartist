<?php


namespace App\Form;


use App\Entity\Avis;
use blackknight467\StarRatingBundle\Form\RatingType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('star', RatingType::class, ['label' => 'Étoiles', 'stars' => 5])
            ->add('commentaire', null, ['label' => 'Commentaire'])
            ->add('Save', SubmitType::class, ['attr' => ['class' => 'btn btn-outline-primary']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
           'data_class' => Avis::class,
        ]);
    }

}