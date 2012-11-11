<?php

namespace Mh\CmsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WebsiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('website_name')
            ->add('website_created_at')
            ->add('website_renewal_date')
            ->add('website_active')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mh\CmsBundle\Entity\Website'
        ));
    }

    public function getName()
    {
        return 'mh_cmsbundle_websitetype';
    }
}
