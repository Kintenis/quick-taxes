<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Routing\Router;

class TaxType extends AbstractType
{
    /**
     * @var Router
     */
    private $router;

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
                'choices'  => array(
                    'Sausis' => 1,
                    'Vasaris' => 2,
                    'Kovas' => 3,
                    'Balandis' => 4,
                    'Gegužė' => 5,
                    'Birželis' => 6,
                    'Liepa' => 7,
                    'Rugpjūtis' => 8,
                    'Rugsėjis' => 9,
                    'Spalis' => 10,
                    'Lapkritis' => 11,
                    'Gruodis' => 12,
                ),
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
                    'step' => '.01',
                ),
                'label' => false,
                'required' => true,
            ))

            ->add('electric', IntegerType::class, array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Elektra',
                    'min' => 0,
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