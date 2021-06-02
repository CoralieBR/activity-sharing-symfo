<?php

namespace App\Form;

use App\Entity\MessageContact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom',null ,['label' => 'prénom'])
            ->add('email')
            ->add('telephone',null ,['label' => 'téléphone'])
            ->add('message',null ,['label' => 'message de contact'])
            ->add('reception',null ,['label' => 'réception du message'])
            ->add('reponse',null ,['label' => 'envoi de la réponse'])
            ->add('answer',null ,['label' => 'message de réponse'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MessageContact::class,
        ]);
    }
}
