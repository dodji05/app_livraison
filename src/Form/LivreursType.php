<?php

namespace App\Form;

use App\Entity\Livreurs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivreursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomLivreur',null,[
                'attr'=>[
                    'class'=>'Livreur_nom form-control',

                ]
            ])
            ->add('PrenomLivreur',null,[
                'attr'=>[
                    'class'=>'Livreur_prenom form-control',

                ]
            ])
            ->add('Telephone1',null,[
                'attr'=>[
                    'class'=>'Livreur_tel1 form-control',
                    'onchange'=> 'remplissage_Livreur(event,this)'
                ]                ]
                )
            ->add('Telephone2',null,[
                'attr'=>[
                    'class'=>'Livreur_tel2 form-control',
                    'onchange'=> 'remplissage_Livreur(event,this)'
                ]   ] )
            
            
            ->add('Sexe',ChoiceType::class,array(
        'choices'  => array(
            'Sexe' => null,
            'Masculin' => 'Masculin',
            'Feminin' => 'Feminin',
        ),),
                [
                    'attr'=>[
                        'class'=>'Livreur_sexe form-control',

                    ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Livreurs::class,
        ]);
    }
}
