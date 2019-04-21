<?php

namespace CompetitionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;


class CompetitionsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title')->add('type')->add('description',CKEditorType::class)->add('dateStart',DateType::class, [
            // renders it as a single text box
            'widget' => 'single_text',
        ])->add('dateFin',DateType::class, [
            // renders it as a single text box
            'widget' => 'single_text',
        ])->add('ville')->add('adresse')->add('codePost')->add('nbrPart')->add('prize')->add('media', UrlType::class, array(
            'required' => false
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CompetitionBundle\Entity\Competitions'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'competitionbundle_competitions';
    }


}
