<?php

namespace Mh\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Mh\CmsBundle\Entity\Page;

/**
 * PageRevision
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class PageRevision
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="page_revision", type="text")
     */
    private $page_revision;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_at", type="integer")
     */
    private $created_at;

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
     * Set page_revision
     *
     * @param string $pageRevision
     * @return PageRevision
     */
    public function setPageRevision($pageRevision)
    {
        $this->page_revision = $pageRevision;
    
        return $this;
    }

    /**
     * Get page_revision
     *
     * @return string 
     */
    public function getPageRevision()
    {
        return $this->page_revision;
    }

    /**
     * Set created_at
     *
     * @param integer $createdAt
     * @return PageRevision
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return integer 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set page
     *
     * @param \Mh\CmsBundle\Entity\Page $page
     * @return PageRevision
     */
    public function setPage(\Mh\CmsBundle\Entity\Page $page = null)
    {
        $this->page = $page;
    
        return $this;
    }

    /**
     * Get page
     *
     * @return \Mh\CmsBundle\Entity\Page 
     */
    public function getPage()
    {
        return $this->page;
    }
}