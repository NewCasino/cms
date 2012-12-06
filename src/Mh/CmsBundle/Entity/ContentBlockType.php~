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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->content_blocks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add content_blocks
     *
     * @param Mh\CmsBundle\Entity\ContentBlock $contentBlocks
     * @return ContentBlockType
     */
    public function addContentBlock(\Mh\CmsBundle\Entity\ContentBlock $contentBlocks)
    {
        $this->content_blocks[] = $contentBlocks;

        return $this;
    }

    /**
     * Remove content_blocks
     *
     * @param Mh\CmsBundle\Entity\ContentBlock $contentBlocks
     */
    public function removeContentBlock(\Mh\CmsBundle\Entity\ContentBlock $contentBlocks)
    {
        $this->content_blocks->removeElement($contentBlocks);
    }

    /**
     * Get content_blocks
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getContentBlocks()
    {
        return $this->content_blocks;
    }

    /**
     * Set content_block_template
     *
     * @param Mh\CmsBundle\Entity\ContentBlockTemplate $contentBlockTemplate
     * @return ContentBlockType
     */
    public function setContentBlockTemplate(\Mh\CmsBundle\Entity\ContentBlockTemplate $contentBlockTemplate = null)
    {
        $this->content_block_template = $contentBlockTemplate;

        return $this;
    }

    /**
     * Get content_block_template
     *
     * @return Mh\CmsBundle\Entity\ContentBlockTemplate
     */
    public function getContentBlockTemplate()
    {
        return $this->content_block_template;
    }

    public function __toString()
    {
        return $this->getContentBlockTypeName();
    }
}