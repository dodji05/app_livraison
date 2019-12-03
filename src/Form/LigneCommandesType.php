<?php

namespace App\Form;

use App\Entity\LigneCommandes;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LigneCommandesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('Plat',EntityType::class, [
                'class' => 'App\Entity\Plats',
                
                'choice_label'=>'libelle',
                'placeholder' => 'Selectionner un plat',
                'attr'=>[
                    'class'=>'vente_id',
                    'onchange'=> 'remplissage_prix(event,this)'
                ]])
            ->add('Restaurant',null,[
                "mapped"=> false,
                'attr'=>[
                    'class'=>'vente_prix text-right',

                ]
            ])
            ->add('PrixVente',null,[
                'attr'=>[
                    'class'=>'vente_prix text-right',

                ]
            ])
            ->add('quantite',IntegerType::class,[
                'attr'=>[
                    'class'=>'vente_qte text-right',
                    'onkeyup'=>'calculetotal(event,this)',
                    'onchange'=>'calculetotal(event,this)'

                ]
            ])
            ->add('total',IntegerType::class,[
                'mapped' =>false,
                'attr'=>[
                    'class'=>'vente_ss_total text-right',
                    'readonly'=>'readonly'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LigneCommandes::class,
        ]);
    }
}
