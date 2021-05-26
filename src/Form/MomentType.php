<?php

namespace App\Form;

use App\Entity\Moment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MomentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('jour', ChoiceType::class, [
                'choicies' => [
                    'lundi' => 'lundi',
                    'mardi' => 'mardi',
                    'mercredi' => 'mercredi',
                    'jeudi' => 'jeudi',
                    'vendredi' => 'vendredi',
                    'samedi' => 'samedi',
                    'dimanche' => 'dimanche',
                ]
            ])
            ->add('heureDebut', TimeType::class)
            ->add('heureFin', TimeTYpe::class)
            ->remove('id_membre')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Moment::class,
        ]);
    }
}
