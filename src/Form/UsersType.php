<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;


class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('isActif')
            ->add('profilePicture', FileType::class, [
                'mapped' => false, 
                'label'  => 'profile picture ( image )',
                'required' => false
                ])
            ->add('password')
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
