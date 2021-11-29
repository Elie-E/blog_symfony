<?php

namespace App\Form;

use App\Entity\BlogCategory;
use App\Entity\BlogPost;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BlogPostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('keyPost')
            ->add('lng')
            ->add('title')
            ->add('image')
            ->add('content')
            ->add('enabled')
            ->add('date_publication')
            ->add('date_creation')
            ->add('date_modification')
            ->add('category', EntityType::class, [
                'class' => BlogCategory::class,
                'expanded' => true,
                'multiple' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BlogPost::class,
        ]);
    }
}
