<?php

namespace App\Form;

use App\Entity\BingoGrid;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BingoGrid2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $locale = $options['idUsr'];
        $builder
            ->add('gridname')
    
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BingoGrid::class,
            'idUsr'=> null,

        ]);
    }
}
