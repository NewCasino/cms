<?php

namespace Mh\CmsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PageType extends AbstractType
{
    private $handler;
    
    public function __construct(\Mh\CmsBundle\Classes\Page\Handler $handler)
    {
        $this->handler = $handler;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('page_name')
            ->add('page_max_children')
            /*->add('page_parent', 'choice', array(
                'choices' => $this->handler->fetchAll()
            ))*/
            ->add('page_parent', 'entity', array(
                'class' => 'MhCmsBundle:Page',
                'choices' => $this->handler->fetchAll(),
                'empty_value' => "Select or leave blank"
            ))
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
        return 'page';
    }
}
