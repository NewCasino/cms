<?php

namespace Mh\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mh\CmsBundle\Entity\Page
 *
 * @ORM\Table(name="pages")
 * @ORM\Entity
 */
class Page
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
     * @var string $page_name
     *
     * @ORM\Column(name="page_name", type="string", length=100)
     */
    private $page_name;

    /**
     * @var integer $page_create_at
     *
     * @ORM\Column(name="page_create_at", type="integer")
     */
    private $page_create_at;

    /**
     * @var integer $page_updated_at
     *
     * @ORM\Column(name="page_updated_at", type="integer")
     */
    private $page_updated_at;

    /**
     * @var string $page_uri
     *
     * @ORM\Column(name="page_uri", type="string", length=255)
     */
    private $page_uri;

    /**
     * @var integer $page_max_children
     *
     * @ORM\Column(name="page_max_children", type="smallint")
     */
    private $page_max_children;

    /**
     * Holds the pages that belong to this website.
     *
     * @ORM\ManyToOne(targetEntity="Website")
     * @var ArrayCollection
     */
    private $website;
    
    /**
     * @ORM\ManyToMany(targetEntity="ContentBlock", mappedBy="pages")
     * @var ArrayCollection
     */
    private $content_blocks;
    
    
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
     * Set page_name
     *
     * @param string $pageName
     * @return Page
     */
    public function setPageName($pageName)
    {
        $this->page_name = $pageName;
    
        return $this;
    }

    /**
     * Get page_name
     *
     * @return string 
     */
    public function getPageName()
    {
        return $this->page_name;
    }

    /**
     * Set page_create_at
     *
     * @param integer $pageCreateAt
     * @return Page
     */
    public function setPageCreateAt($pageCreateAt)
    {
        $this->page_create_at = $pageCreateAt;
    
        return $this;
    }

    /**
     * Get page_create_at
     *
     * @return integer 
     */
    public function getPageCreateAt()
    {
        return $this->page_create_at;
    }

    /**
     * Set page_updated_at
     *
     * @param integer $pageUpdatedAt
     * @return Page
     */
    public function setPageUpdatedAt($pageUpdatedAt)
    {
        $this->page_updated_at = $pageUpdatedAt;
    
        return $this;
    }

    /**
     * Get page_updated_at
     *
     * @return integer 
     */
    public function getPageUpdatedAt()
    {
        return $this->page_updated_at;
    }

    /**
     * Set page_uri
     *
     * @param string $pageUri
     * @return Page
     */
    public function setPageUri($pageUri)
    {
        $this->page_uri = $pageUri;
    
        return $this;
    }

    /**
     * Get page_uri
     *
     * @return string 
     */
    public function getPageUri()
    {
        return $this->page_uri;
    }

    /**
     * Set page_max_children
     *
     * @param integer $pageMaxChildren
     * @return Page
     */
    public function setPageMaxChildren($pageMaxChildren)
    {
        $this->page_max_children = $pageMaxChildren;
    
        return $this;
    }

    /**
     * Get page_max_children
     *
     * @return integer 
     */
    public function getPageMaxChildren()
    {
        return $this->page_max_children;
    }

    /**
     * Set website
     *
     * @param Mh\CmsBundle\Entity\Website $website
     * @return Page
     */
    public function setWebsite(\Mh\CmsBundle\Entity\Website $website = null)
    {
        $this->website = $website;
    
        return $this;
    }

    /**
     * Get website
     *
     * @return Mh\CmsBundle\Entity\Website 
     */
    public function getWebsite()
    {
        return $this->website;
    }
}