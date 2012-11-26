<?php

namespace Mh\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * Holds the user to website allocation for this website.
     *
     * @ORM\OneToMany(targetEntity="Mh\CmsBundle\Entity\WebsiteAllocation", mappedBy="user", cascade="persist")
     * @var ArrayCollection
     */
    //private $allocation;
    
    /**
     * @ORM\ManyToMany(targetEntity="Mh\CmsBundle\Entity\Website", mappedBy="users")
     * @var ArrayCollection 
     */
    private $websites;
    
    /**
     * @ORM\ManyToOne(targetEntity="Mh\CmsBundle\Entity\Website")
     * @var type 
     */
    private $active_website;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        
        //$this->allocation = new \Doctrine\Common\Collections\ArrayCollection();
        $this->websites = new ArrayCollection();
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
     * Add websites
     *
     * @param \Mh\CmsBundle\Entity\Website $websites
     * @return User
     */
    public function addWebsite(\Mh\CmsBundle\Entity\Website $websites)
    {
        $this->websites[] = $websites;
    
        return $this;
    }

    /**
     * Remove websites
     *
     * @param \Mh\CmsBundle\Entity\Website $websites
     */
    public function removeWebsite(\Mh\CmsBundle\Entity\Website $websites)
    {
        $this->websites->removeElement($websites);
    }

    /**
     * Get websites
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWebsites()
    {
        return $this->websites;
    }

    /**
     * Set active_website
     *
     * @param \Mh\CmsBundle\Entity\Website $activeWebsite
     * @return User
     */
    public function setActiveWebsite(\Mh\CmsBundle\Entity\Website $activeWebsite = null)
    {
        $this->active_website = $activeWebsite;
    
        return $this;
    }

    /**
     * Get active_website
     *
     * @return \Mh\CmsBundle\Entity\Website 
     */
    public function getActiveWebsite()
    {
        return $this->active_website;
    }
}