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
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, ['required'=>true])
            ->remove('roles')
            ->add('password', PasswordType::class,['label' => 'mot de passe', 'required'=>false])
            ->add('nom')
            ->add('prenom',null ,['label' => 'prénom', 'required'=>true])
            ->add('pseudo', null, ['required'=>true])
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
            ->add('genre', ChoiceType::class, [
                'expanded' => false,
                'multiple' => false,
                'choices' => [
                    'Femme' => 'female',
                    'Homme' => 'male',
                    'Non-Binaire' => 'non-binaire',
                    'Autre' => 'autre',
                ]
            ])
            ->add('adresseNumero')
            ->add('adresseRue')
            ->add('cp',null ,['label' => 'code postal', 'required'=>true])
            ->add('ville', null, ['required'=>true])
            ->add('pays', null, ['required'=>true])
            ->add('latitude', HiddenType::class)
            ->add('longitude', HiddenType::class)
            ->add('distancekm', null, [
                'required'   => false,
                'empty_data' => '10',])
            ->remove('badges')
            ->add('info',null ,['label' => 'Cochez la case si vous acceptez de partager vos informations avec d\'autres membres']);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Membre::class,
        ]);
    }
}
