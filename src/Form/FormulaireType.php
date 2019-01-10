<?php

namespace App\Form;

use App\Entity\Division;
use App\Entity\Formulaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class FormulaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('categorie')
            ->add(
                'categoryEntity',
                EntityType::class,
                [
                    'class' => Division::class,
                    'choice_label' => 'nDivis',
                    'expanded' => false,
                    'multiple' => false
                ]
            )
            ->add('Email')
            ->add('message')

        ;
        $builder->setMethod('POST');

        return $builder;

    }






    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formulaire::class,
        ])
        ;

    }
}
