<?php

namespace Mh\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Mh\CmsBundle\Entity\ContentBlock
 *
 * @ORM\Table(name="content_blocks")
 * @ORM\Entity
 */
class ContentBlock
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
     * @var string $content_block_content
     *
     * @ORM\Column(name="content_block_content", type="text")
     */
    private $content_block_content;

    /**
     * @var integer $content_block_rank
     *
     * @ORM\Column(name="content_block_rank", type="smallint")
     */
    private $content_block_rank;
    
    /**
     * @ORM\ManyToOne(targetEntity="ContentBlockType")
     * @var ArrayCollection
     */
    private $content_block_type;
    
    /**
     * @ORM\ManyToMany(targetEntity="Page", inversedBy="content_blocks")
     * @var ArrayCollection
     */
    private $pages;
    
    /**
     * @ORM\OneToMany(targetEntity="ContentBlock", mappedBy="parent")
     * @var self
     */
    private $children;
    
    /**
     * @ORM\ManyToOne(targetEntity="ContentBlock")
     * @var self
     */
    private $parent;

    public function __construct()
    {
    	$this->pages = new ArrayCollection;
        $this->children = new ArrayCollection;
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
     * Set content_block_content
     *
     * @param string $contentBlockContent
     * @return ContentBlock
     */
    public function setContentBlockContent($contentBlockContent)
    {
        $this->content_block_content = $contentBlockContent;
    
        return $this;
    }

    /**
     * Get content_block_content
     *
     * @return string 
     */
    public function getContentBlockContent()
    {
        return $this->content_block_content;
    }

    /**
     * Set content_block_rank
     *
     * @param integer $contentBlockRank
     * @return ContentBlock
     */
    public function setContentBlockRank($contentBlockRank)
    {
        $this->content_block_rank = $contentBlockRank;
    
        return $this;
    }

    /**
     * Get content_block_rank
     *
     * @return integer 
     */
    public function getContentBlockRank()
    {
        return $this->content_block_rank;
    }

    /**
     * Set content_block_type
     *
     * @param Mh\CmsBundle\Entity\ContentBlockType $contentBlockType
     * @return ContentBlock
     */
    public function setContentBlockType(\Mh\CmsBundle\Entity\ContentBlockType $contentBlockType = null)
    {
        $this->content_block_type = $contentBlockType;
    
        return $this;
    }

    /**
     * Get content_block_type
     *
     * @return Mh\CmsBundle\Entity\ContentBlockType 
     */
    public function getContentBlockType()
    {
        return $this->content_block_type;
    }

    /**
     * Add pages
     *
     * @param Mh\CmsBundle\Entity\Page $pages
     * @return ContentBlock
     */
    public function addPage(\Mh\CmsBundle\Entity\Page $pages)
    {
        $this->pages[] = $pages;
    
        return $this;
    }

    /**
     * Remove pages
     *
     * @param Mh\CmsBundle\Entity\Page $pages
     */
    public function removePage(\Mh\CmsBundle\Entity\Page $pages)
    {
        $this->pages->removeElement($pages);
    }

    /**
     * Get pages
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Add children
     *
     * @param \Mh\CmsBundle\Entity\ContentBlock $children
     * @return ContentBlock
     */
    public function addChildren(\Mh\CmsBundle\Entity\ContentBlock $children)
    {
        $this->children[] = $children;
    
        return $this;
    }

    /**
     * Remove children
     *
     * @param \Mh\CmsBundle\Entity\ContentBlock $children
     */
    public function removeChildren(\Mh\CmsBundle\Entity\ContentBlock $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set parent
     *
     * @param \Mh\CmsBundle\Entity\ContentBlock $parent
     * @return ContentBlock
     */
    public function setParent(\Mh\CmsBundle\Entity\ContentBlock $parent = null)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return \Mh\CmsBundle\Entity\ContentBlock 
     */
    public function getParent()
    {
        return $this->parent;
    }
}