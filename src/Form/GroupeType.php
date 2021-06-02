<?php

namespace App\Form;

use App\Entity\Groupe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class GroupeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomGroupe', null, ['required'=>true])
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'required'=>true
            ])
            ->add('jour', ChoiceType::class, [
                'required'=>true,
                'choices' => [
                    'lundi' => 'lundi',
                    'mardi' => 'mardi',
                    'mercredi' => 'mercredi',
                    'jeudi' => 'jeudi',
                    'vendredi' => 'vendredi',
                    'samedi' => 'samedi',
                    'dimanche' => 'dimanche',
                ]
            ])
            ->add('heureDebut', NumberType::class, ['required'=>true])
            ->add('heureFin', NumberType::class, ['required'=>true])
            ->add('adresseNumero',null ,['label' => 'numéro de rue'])
            ->add('adresseRue',null ,['label' => 'nom de rue'])
            ->add('cp',null ,['label' => 'code postal', 'required'=>true])
            ->add('ville', null, ['required'=>true])
            ->add('pays', null, ['required'=>true])
            ->add('latitude', HiddenType::class, ['required'=>true])
            ->add('longitude', HiddenType::class, ['required'=>true])
            ->remove('valide')
            ->add('activite', null, ['required'=>true])
            ->add('description')
            // ->add('creePar')
            // ->add('membres')
            // ->add('invitations')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Groupe::class,
        ]);
    }
}
