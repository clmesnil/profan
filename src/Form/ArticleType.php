<?php

namespace App\Form;

use App\Entity\Stock;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Type')
            ->add('Category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'title'
            ])
            ->add('Image')
            ->add('Description')
            ->add('Emplacement')
            ->add('Quantite')
            ->add('Dimensions')
            ->add('Grammage')
            ->add('Barcode')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Stock::class,
        ]);
    }
}
