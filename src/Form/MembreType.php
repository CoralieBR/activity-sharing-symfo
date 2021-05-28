<?php

namespace App\Form;

use App\Entity\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MembreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class)
            ->remove('roles')
            ->add('password', PasswordType::class, ['required'=>false])
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
            ->add('modifier', SubmitType::class, ['attr'=>["class"=>"mt-3 btn-info"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Membre::class,
        ]);
    }
}
