<?php

namespace App\Form;

use App\Entity\Billing;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class BillingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'Facture' => 'FACTURE',
                    'Devis' => 'DEVIS'
                ],
            ])
            ->add('client_name', TextType::class) // Utilisation de 'client_name' au lieu de 'clientName'
            ->add('client_address', TextType::class) // Utilisation de 'client_address' au lieu de 'clientAddress'
            ->add('code_postal', TextType::class) // Utilisation de 'client_address' au lieu de 'clientAddress'
            ->add('city', TextType::class) // Utilisation de 'client_address' au lieu de 'clientAddress'
            ->add('start_date', DateTimeType::class) // Utilisation de 'start_date' au lieu de 'startDate'
            ->add('end_date', DateTimeType::class) // Utilisation de 'end_date' au lieu de 'endDate'
            ->add('service_name', TextType::class) // Utilisation de 'service_name' au lieu de 'serviceName'
            ->add('tva', NumberType::class)
            ->add('number_of_people', NumberType::class) // Utilisation de 'number_of_people' au lieu de 'numberOfPeople'
            ->add('price_per_person', NumberType::class) // Utilisation de 'price_per_person' au lieu de 'pricePerPerson'
            ->add('discount', NumberType::class, [
                'required' => false
            ])
            ->add('gift', TextType::class, [
                'required' => false
            ])
            ->add('payment', TextType::class, [
                'required' => false
            ])
            ->add('observation', TextType::class, [
                'required' => false
            ])
            ->add('options', CollectionType::class, [
                'entry_type' => OptionType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => false,
                'prototype' => true,
                'attr' => [
                    'class' => 'options-collection'
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Billing::class,
        ]);
    }
}
