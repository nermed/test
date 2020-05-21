<?php

namespace App\Form;

use App\Entity\Faculte;
use App\Entity\Etudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('math')
            ->add('physique')
            ->add('geo')
            ->add('histoire')
            ->add('francais')
            ->add('gestion')
            ->add('imageFile', FileType::class,[
                'required' => false
            ])
            ->add('faculte', EntityType::class, [
                'class' => Faculte::class,
                'required' => false,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
