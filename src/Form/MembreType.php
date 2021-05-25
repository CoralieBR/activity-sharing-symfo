<?php

namespace App\Form;

use App\Entity\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MembreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class)
            ->remove('roles')
            ->add('password', PasswordType::class)
            ->add('nom')
            ->add('prenom')
            ->add('pseudo')
            ->remove('photo')
            ->add('telephone')
            ->add('genre')
            ->add('adresseNumero')
            ->add('adresseRue')
            ->add('cp')
            ->add('ville')
            ->add('pays')
            ->remove('latitude')
            ->remove('longitude')
            ->add('distancekm')
            ->remove('badges')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Membre::class,
        ]);
    }
}
