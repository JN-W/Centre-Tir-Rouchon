<?php

namespace App\Form;

use App\Entity\News;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class NewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null, ['label' => 'Titre de la publication'])
            ->add('recap', null, ['label' => 'Récapitulatif de la publication'])
            ->add('content', null, ['label' => 'Contenu complet de la publication'])
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
            ->add('pictures', FileType::class, [
                'label' => 'Ajouter une photo',
                // unmapped means that this field is not associated to any entity property
                'mapped' => false,
                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,
                // To allow upload of several pictures
                'multiple' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => News::class,
        ]);
    }
}
