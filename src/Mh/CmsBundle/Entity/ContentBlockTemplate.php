<?php

namespace Mh\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Colletions\ArrayCollection;

/**
 * Mh\CmsBundle\Entity\Template
 *
 * @ORM\Table(name="content_block_templates")
 * @ORM\Entity
 */
class ContentBlockTemplate
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $template_name
     *
     * @ORM\Column(name="template_name", type="string", length=20)
     */
    private $template_name;

    /**
     * @var string $template_description
     *
     * @ORM\Column(name="template_description", type="string", length=140)
     */
    private $template_description;

    /**
     * @var string $template_include_path
     *
     * @ORM\Column(name="template_include_path", type="string", length=100)
     */
    private $template_include_path;
    
    /**
     * @ORM\OneToMany(targetEntity="ContentBlockType", mappedBy="content_block_template")
     * @var ArrayCollection
     */
    private $content_block_types;
    
    public function __construct()
    {
    	$this->content_blocks = new ArrayCollection;
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set template_name
     *
     * @param string $templateName
     * @return Template
     */
    public function setTemplateName($templateName)
    {
        $this->template_name = $templateName;
    
        return $this;
    }

    /**
     * Get template_name
     *
     * @return string 
     */
    public function getTemplateName()
    {
        return $this->template_name;
    }

    /**
     * Set template_description
     *
     * @param string $templateDescription
     * @return Template
     */
    public function setTemplateDescription($templateDescription)
    {
        $this->template_description = $templateDescription;
    
        return $this;
    }

    /**
     * Get template_description
     *
     * @return string 
     */
    public function getTemplateDescription()
    {
        return $this->template_description;
    }

    /**
     * Set template_include_path
     *
     * @param string $templateIncludePath
     * @return Template
     */
    public function setTemplateIncludePath($templateIncludePath)
    {
        $this->template_include_path = $templateIncludePath;
    
        return $this;
    }

    /**
     * Get template_include_path
     *
     * @return string 
     */
    public function getTemplateIncludePath()
    {
        return $this->template_include_path;
    }
}