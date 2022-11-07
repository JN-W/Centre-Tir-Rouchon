<?php

namespace App\Form;

use App\Entity\News;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null, ['label' => 'Titre de la publication'])
            ->add('recap', null, ['label' => 'Récapitulatif de la publication'])
            ->add('content', null, ['label' => 'Contenu complet de la publication'])
            ->add('image')
            ->add('category',


                ChoiceType::class, [
                    'expanded' => true,
                    'multiple' => false,
                    'choices'  => [
                        'Vie du club' => 'actualite',
                        'Résultats sportifs' => 'results',
                                    ]
                ])
            ->add('creationDate', null, ['label' => 'Date de création'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => News::class,
        ]);
    }
}
