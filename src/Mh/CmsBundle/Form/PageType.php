<?php

namespace Mh\CmsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('page_name')
            ->add('page_create_at')
            ->add('page_updated_at')
            ->add('page_uri')
            ->add('page_max_children')
            ->add('website')
            ->add('content_blocks')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mh\CmsBundle\Entity\Page'
        ));
    }

    public function getName()
    {
        return 'mh_cmsbundle_pagetype';
    }
}
