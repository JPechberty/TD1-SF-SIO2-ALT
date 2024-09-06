<?php

namespace App\Form;

use App\Entity\Incident;
use App\Entity\Priority;
use App\Entity\Type;
use Symfony\Component\DomCrawler\Field\TextareaFormField;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IncidentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('reporterEmail',EmailType::class,[
                'label' => 'Contact Email',
                'attr' => [
                    'placeholder' => 'Email',
                ],
            ])
            ->add('description',TextareaType::class,[
                'label' => 'Description',
                'attr' => [
                    'placeholder' => 'Enter a description',
                    'rows' => 5,
                ],
            ])
            ->add('priority',EnumType::class,[
                'label' => 'Priority',
                'class' => Priority::class,
                'choice_label' => function($priority){
                    return $priority->value;
                }
            ])
            ->add('types',EnumType::class,[
                'label' => 'Priority',
                'class' => Type::class,
                'label_attr' => [
                    'class' => 'checkbox-inline',
                ],
                'choice_label' => function($type){
                    return $type->value;
                },
                "multiple" => true,
                'expanded' => true,
                'by_reference' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Incident::class,
        ]);
    }
}
