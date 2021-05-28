<?php

namespace App\Form;

use App\Entity\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MembreActivityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('email')
            ->remove('roles')
            ->remove('password')
            ->remove('nom')
            ->remove('prenom')
            ->remove('pseudo')
            ->remove('photo')
            ->remove('telephone')
            ->remove('genre')
            ->remove('adresseNumero')
            ->remove('adresseRue')
            ->remove('cp')
            ->remove('ville')
            ->remove('pays')
            ->remove('latitude')
            ->remove('longitude')
            ->remove('distancekm')
            ->remove('badges')
            ->add('activites')
            ->add('Ajouter', SubmitType::class, ['attr'=>["class"=>"mt-3 btn-info"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Membre::class,
        ]);
    }
}
