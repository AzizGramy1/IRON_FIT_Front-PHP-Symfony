<?php

namespace App\Form;

use App\Entity\SujetsForum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SujetsForumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateCreations', null, [
                'widget' => 'single_text',
            ])
            ->add('sujet')
            ->add('theme')
            ->add('descriptifSujet')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SujetsForum::class,
        ]);
    }
}
