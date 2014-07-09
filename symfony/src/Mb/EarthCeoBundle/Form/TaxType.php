<?php

namespace Mb\EarthCeoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TaxType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('city')
            ->add('country')
            ->add('taxesPIT')
            ->add('taxesCIT')
            ->add('taxesVAT')
            ->add('taxesOther')
            ->add('population')
            ->add('mayorName')
            ->add('mayorEmail')
            ->add('updateDate')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mb\EarthCeoBundle\Entity\Tax'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mb_earthceobundle_tax';
    }
}
