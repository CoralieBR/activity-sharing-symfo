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
            ->remove('password',null ,['label' => 'mot de passe'])
            ->remove('nom')
            ->remove('prenom',null ,['label' => 'prénom'])
            ->remove('pseudo')
            ->remove('photo')
            ->remove('telephone',null ,['label' => 'téléphone'])
            ->remove('genre')
            ->remove('adresseNumero',null ,['label' => 'numéro de rue'])
            ->remove('adresseRue',null ,['label' => 'nom de rue'])
            ->remove('cp',null ,['label' => 'code postal'])
            ->remove('ville')
            ->remove('pays')
            ->remove('latitude')
            ->remove('longitude')
            ->remove('distancekm')
            ->remove('badges')
            ->add('activites')
            ->add('Ajouter', SubmitType::class, ['attr'=>["class"=>"big-btn1"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Membre::class,
        ]);
    }
}
