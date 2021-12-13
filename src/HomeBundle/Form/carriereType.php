<?php

namespace HomeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class carriereType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre')->add('description',TextareaType::class)->add('profil',TextareaType::class)
            ->add('missions',TextareaType::class)->add('salaire')->add('disponnibilite')
            ->add('type_contrat',ChoiceType::class, [
                'choices' => [
                    'Alternance' => 'Alternance',
                    'CDI' => 'CDI',
                    'CDD' => 'CDD',
                    'STAGE' => 'STAGE'
                ]
            ])
            ->add('locatisation');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HomeBundle\Entity\carriere'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'homebundle_carriere';
    }


}
