<?php 
// src/Form/Type/ShippingType.php
namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StatusArticleType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => [
                'Standard Status' => 'standard',
                'Expedited Status' => 'super',
                'Priority Status' => 'priority',
            ],
        ]);
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }
}