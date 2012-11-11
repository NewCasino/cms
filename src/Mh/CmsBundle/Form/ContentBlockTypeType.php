<?php

namespace Mh\CmsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContentBlockTypeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content_block_type_name')
            ->add('content_block_template')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mh\CmsBundle\Entity\ContentBlockType'
        ));
    }

    public function getName()
    {
        return 'mh_cmsbundle_contentblocktypetype';
    }
}
