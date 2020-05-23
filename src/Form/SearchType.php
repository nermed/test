<?php

namespace App\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Etudiant;
use App\Entity\Search;
use App\Entity\Faculte;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('nom',null,[
                'label' => false,
                'attr' => [
                    'required' => false,
                    'placeholder' => 'Nom'
                ]
                //'class' => Etudiant::class,
            ])
           /* ->add('faculte', EntityType::class, [
                'class' => Faculte::class,
                'choice_label' => 'name'
            ])*/
            ->add('submit', SubmitType::class)
            ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }



}