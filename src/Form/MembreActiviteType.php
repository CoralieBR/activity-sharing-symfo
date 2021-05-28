<?php

namespace App\Form;

use App\Entity\Activite;
use App\Entity\MembreActivite;
use App\Repository\ActiviteRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\Loader\CallbackChoiceLoader;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MembreActiviteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // $activite = new Activite();
        // $activites = $activite->getNomActivite();
        // foreach ($variable as $key => $value) {
        //     # code...
        // }

        // $activitesRepository = new ActiviteRepository()->findAll
        // $slides = $carouselRepository->findBy(["active"=>1], ["id"=>"DESC"]);
        
        $builder
            ->remove('membres')
            // ->add('activites', ChoiceType::class, [
            //     'expanded' => true,
            //     'multiple' => true,
            //     'choices' => $activites
            // ])
            // ->add('activites', ChoiceType::class, [
            //     'choice_loader' => new CallbackChoiceLoader(function() {
            //         return StaticClass::getConstants();
            //     }),
            // ])
            ->add('activites', CollectionType::class, ['entry_type'=>ActiviteType::class])
            // , ChoiceType::class, [
            //         'expanded' => true,
            //         'multiple' => true,
            //         'choices' => [
            //             'A' => 'A',
            //             'B' => 'B',
            //             'C' => 'C'
            //         ]
            //     ])
            ->add('Ajouter', SubmitType::class, ['attr'=>["class"=>"mt-3 btn-info"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MembreActivite::class,
        ]);
    }
}
