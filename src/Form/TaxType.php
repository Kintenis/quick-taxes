<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('year', ChoiceType::class, array(
                'choices'  => array(
                    2019 => 2019,
                    2020 => 2020,
                    2021 => 2021,
                    2022 => 2022,
                ),
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label' => false,
            ))

            ->add('month', ChoiceType::class, array(
                'attr' => array(
                    'class' => 'form-control',
                ),
                'label' => false,
            ))

            ->add('hotWc', NumberType::class, array(
                'html5' => true,
                'scale' => 2,
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Karštas',
                    'min' => 0,
                    'max' => 1000,
                    'step' => '.01',
                ),
                'label' => false,
                'required' => true,
            ))

            ->add('hotKitchen', NumberType::class, array(
                'html5' => true,
                'scale' => 2,
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Karštas',
                    'min' => 0,
                    'max' => 1000,
                    'step' => '.01',
                ),
                'label' => false,
                'required' => true,
            ))

            ->add('coldWc', NumberType::class, array(
                'html5' => true,
                'scale' => 2,
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Šaltas',
                    'min' => 0,
                    'max' => 1000,
                    'step' => '.01',
                ),
                'label' => false,
                'required' => true,
            ))

            ->add('coldKitchen', NumberType::class, array(
                'html5' => true,
                'scale' => 2,
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Šaltas',
                    'min' => 0,
                    'max' => 1000,
                    'step' => '.01',
                ),
                'label' => false,
                'required' => true,
            ))

            ->add('electric', IntegerType::class, array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Elektra',
                    'min' => 1000,
                    'max' => 100000,
                ),
                'label' => false,
                'required' => true,
            ))

            ->add('tax', NumberType::class, array(
                'html5' => true,
                'scale' => 2,
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Mokesčiai',
                    'min' => 0,
                    'max' => 1000,
                    'step' => '.01',
                ),
                'label' => false,
                'required' => true,
            ))

            ->add('fund', NumberType::class, array(
                'html5' => true,
                'scale' => 2,
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Kaupiamasis fondas',
                    'min' => 0,
                    'max' => 100,
                    'step' => '.01',
                ),
                'label' => false,
                'required' => true,
            ))

            ->add('submit', SubmitType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary',
                ),
                'label' => 'Patvirtinti',
            ))
        ;
    }
}