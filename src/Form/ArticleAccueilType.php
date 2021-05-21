<?php

namespace App\Form;

use App\Entity\ArticleAccueil;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleAccueilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('texte')
            ->remove('image')
            ->add('imageFile', FileType::class)
            ->add('position')
            ->add('active')
            ->add('boutonTexte')
            ->add('boutonLien')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ArticleAccueil::class,
        ]);
    }
}
