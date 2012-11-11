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

    public function __construct()
    {
    	$this->pages = new ArrayCollection;
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
}
