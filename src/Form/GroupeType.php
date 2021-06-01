<?php

namespace App\Form;

use App\Entity\Groupe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class GroupeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomGroupe')
            ->add('date', DateTimeType::class)
            ->add('jour', ChoiceType::class, [
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
            ->add('heureDebut', NumberType::class)
            ->add('heureFin', NumberType::class)
            ->add('adresseNumero')
            ->add('adresseRue')
            ->add('cp')
            ->add('ville')
            ->add('pays')
            ->add('latitude', HiddenType::class)
            ->add('longitude', HiddenType::class)
            ->remove('valide')
            ->add('activite')
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
