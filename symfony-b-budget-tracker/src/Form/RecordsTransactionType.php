<?php

namespace App\Form;

use App\Entity\CategoryTransaction;
use App\Entity\PayeeTransaction;
use App\Entity\PeriodTransaction;
use App\Entity\RecordsTransaction;
use App\Entity\TypeTransaction;
use App\Entity\YearTransaction;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecordsTransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameTransaction')
            ->add('bedrag')
            ->add('payment_day')
            ->add('payee_name', EntityType::class, [
                'class' => PayeeTransaction::class,
                'choice_label' => 'payee_name',
            ])
            ->add('type_name', EntityType::class, [
                'class' => TypeTransaction::class,
                'choice_label' => 'type_name',
            ])
            ->add('category_name', EntityType::class, [
                'class' => CategoryTransaction::class,
                'choice_label' => 'category_name',
            ])
            ->add('year', EntityType::class, [
                'class' => YearTransaction::class,
                'choice_label' => 'year',
            ])
            ->add('period_name', EntityType::class, [
                'class' => PeriodTransaction::class,
                'choice_label' => 'period_name',
                'multiple' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RecordsTransaction::class,
        ]);
    }
}
