<?php

namespace App\Form;

use App\Entity\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class InscriptionType extends AbstractType
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
            ->add('photo', ChoiceType::class, [
                'expanded' => false,
                'multiple' => false,
                'choices' => [
                    'Avataaars' => 'avataaars',
                    'Bottts' => 'bottts',
                    'Femme' => 'female',
                    'Gridy' => 'gridy',
                    'Homme' => 'male',
                    'Humain.e' => 'human',
                ]
            ])
            ->add('telephone')
            ->add('genre')
            ->add('adresseNumero')
            ->add('adresseRue')
            ->add('cp')
            ->add('ville')
            ->add('pays')
            ->add('latitude', HiddenType::class)
            ->add('longitude', HiddenType::class)
            ->add('distancekm', null, [
                'required'   => false,
                'empty_data' => '10',])
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
