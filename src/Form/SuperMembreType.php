<?php

namespace App\Form;

use App\Entity\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SuperMembreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('email')
            ->add('role', ChoiceType::class, [
                'choices' => [
                    'Membre'=>  'ROLE_USER',
                    'Super membre'=>  'ROLE_SUPER_USER',
                ]
            ] )
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Membre::class,
        ]);
    }
}
