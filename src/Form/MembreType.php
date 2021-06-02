<?php

namespace App\Form;

use App\Entity\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
            ->add('prenom',null ,['label' => 'prénom'])
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
            ->add('telephone',null ,['label' => 'téléphone'])
            ->add('genre')
            ->add('adresseNumero',null ,['label' => 'numéro de rue'])
            ->add('adresseRue',null ,['label' => 'nom de rue'])
            ->add('cp',null ,['label' => 'code postal'])
            ->add('ville')
            ->add('pays')
            ->remove('latitude')
            ->remove('longitude')
            ->add('distancekm',  null, [
                'required'   => false,
                'empty_data' => '10',])
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
