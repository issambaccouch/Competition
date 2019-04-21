<?php

namespace CompetitionBundle\Form;

use Misd\PhoneNumberBundle\Form\Type\PhoneNumberType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class CvsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('prenom')->add('dateNaissance',DateType::class, [
            // renders it as a single text box
            'widget' => 'single_text',
        ])->add('telphoneMobile', PhoneNumberType::class)->add('pays')->add('codePostal')->add('diplome')->add('photo')
        ->add('description');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CompetitionBundle\Entity\Cvs'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'competitionbundle_cvs';
    }


}
