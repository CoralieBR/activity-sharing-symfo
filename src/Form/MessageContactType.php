<?php

namespace App\Form;

use App\Entity\MessageContact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', null, ['disabled'=>true])
            ->add('prenom', null, ['disabled'=>true])
            ->add('email', null, ['disabled'=>true])
            ->add('telephone', null, ['disabled'=>true])
            ->add('message', null, ['disabled'=>true])
            ->add('reception', DateType::class, [
                'widget' => 'single_text',
                'disabled' => true,
            ])
            ->remove('reponse', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('answer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MessageContact::class,
        ]);
    }
}
