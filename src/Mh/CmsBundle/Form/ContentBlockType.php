<?php

namespace Mh\CmsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContentBlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content_block_content')
            ->add('content_block_rank')
            ->add('content_block_type')
            ->add('pages')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Mh\CmsBundle\Entity\ContentBlock'
        ));
    }

    public function getName()
    {
        return 'mh_cmsbundle_contentblocktype';
    }
}
