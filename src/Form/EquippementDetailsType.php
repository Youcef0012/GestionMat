<?php

namespace App\Form;

use App\Entity\Equippement;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquippementDetailsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('serialnumber', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Numéro de série')))
            ->add('toAdd', CheckboxType::class, [
                'label' => 'Je souhaite ajouter une catégorie',
                'required' => false,
            ])
            ->add('category', null, [
                    'attr' => ['id' => 'Category'
                    ]
                ]
            )
            ->add('description', TextareaType::class, array(
                'attr' => array(
                    'placeholder' => "Plus de détails sur l'équippement")
            ))
            ->add('ajouter', SubmitType::class, [
                    'attr' => ['class' => 'btn btn-primary  float-light'
                    ]
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Equippement::class,
        ]);
    }
}
