<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\OptionsResolver\OptionsResolver;


class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('isActif')
        ;
        $builder->get('roles')
        ->addModelTransformer(new CallbackTransformer(
            function ($tagsAsArray): string {
                // transform the array to a string
                return implode(', ', $tagsAsArray);
            },
            function ($tagsAsString): array {
                // transform the string back to an array
                return explode(', ', $tagsAsString);
            }
        ))
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
