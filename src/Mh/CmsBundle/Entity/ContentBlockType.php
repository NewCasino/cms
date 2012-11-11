<?php

namespace Mh\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mh\CmsBundle\Entity\ContentBlockType
 *
 * @ORM\Table(name="content_block_types")
 * @ORM\Entity
 */
class ContentBlockType
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
     * @var string $content_block_type_name
     *
     * @ORM\Column(name="content_block_type_name", type="string", length=50)
     */
    private $content_block_type_name;

    /**
     * @ORM\OneToMany(targetEntity="ContentBlock", mappedBy="content_block")
     * @var ArrayCollection
     */
    private $content_blocks;
    
    /**
     * @ORM\ManyToOne(targetEntity="ContentBlockTemplate")
     * @var ArrayCollection
     */
    private $content_block_template;
    
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
     * Set content_block_type_name
     *
     * @param string $contentBlockTypeName
     * @return ContentBlockType
     */
    public function setContentBlockTypeName($contentBlockTypeName)
    {
        $this->content_block_type_name = $contentBlockTypeName;
    
        return $this;
    }

    /**
     * Get content_block_type_name
     *
     * @return string 
     */
    public function getContentBlockTypeName()
    {
        return $this->content_block_type_name;
    }
}
