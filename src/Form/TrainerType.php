<?php

namespace App\Form;

use App\Entity\Subject;
use App\Entity\Trainer;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TrainerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // TextType::class définit le type des champs
            ->add('firstName', TextType::class, [
                'label' => 'FirstName',
                'required' => false
            ])
            ->add('lastName', TextType::class, [
                'label' => 'LastName'
            ])
            ->add('profession')
            ->add('bio')
            // ChoiceType::class définit le type checkbox 
            ->add('stars', ChoiceType::class, [
                'label' => 'Rating',
                'choices'  => [
                    '-1' => -1,
                    '0' => 0,
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                ],
            ])
            // définit la relation entre subject et trainer
            ->add('subjects', EntityType::class, [
                'class' => Subject::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'help' => 'Subject professor.',
                // Query builder permet de faire une requête sur la base de données dans la table subject
                'query_builder' => function (EntityRepository $er): QueryBuilder {
                    return $er->createQueryBuilder('s')
                        ->orderBy('s.name', 'DESC');
                },
                'by_reference' => false,
                /**
                 * Lorsque by_reference est défini sur false, Symfony utilise les méthodes add et remove définies sur l'entité pour manipuler la collection
                 */
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trainer::class,
        ]);
    }
}
