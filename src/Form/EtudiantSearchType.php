<?php

namespace App\Form;


use App\Entity\EtudiantSearch;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', [
                'required' => false,
                'label' => false,
                'attr' => ['placeholder'=> 'Nom']
            ])
            ->add('prenom', [
                'required' => false,
                'label' => false,
                'attr' => ['placeholder'=> 'Prenom']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EtudiantSearch::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }
    public function getBlockPrefix()
    {
        return '';
    }
}