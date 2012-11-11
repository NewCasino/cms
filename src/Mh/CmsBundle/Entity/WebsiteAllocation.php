<?php

namespace Mh\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mh\CmsBundle\Entity\WebsiteAllocation
 *
 * @ORM\Table(name="website_allocation")
 * @ORM\Entity
 */
class WebsiteAllocation
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
     * @var integer $allocation_owner
     *
     * @ORM\Column(name="allocation_owner", type="smallint")
     */
    private $allocation_owner;
    
    /**
     * Holds the user to website allocation for this website.
     *
     * @ORM\ManyToOne(targetEntity="Website")
     * @var ArrayCollection
     */
    private $websites;
    
    /**
     * Holds the user to website allocation for this website.
     *
     * @ORM\ManyToOne(targetEntity="Mh\UserBundle\Entity\User")
     * @var ArrayCollection
     */
    private $users;


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
     * Set website_owner
     *
     * @param integer $websiteOwner
     * @return WebsiteAllocation
     */
    public function setWebsiteOwner($websiteOwner)
    {
        $this->website_owner = $websiteOwner;
    
        return $this;
    }

    /**
     * Get website_owner
     *
     * @return integer 
     */
    public function getWebsiteOwner()
    {
        return $this->website_owner;
    }

    /**
     * Set websites
     *
     * @param Mh\CmsBundle\Entity\Website $websites
     * @return WebsiteAllocation
     */
    public function setWebsites(\Mh\CmsBundle\Entity\Website $websites = null)
    {
        $this->websites = $websites;
    
        return $this;
    }

    /**
     * Get websites
     *
     * @return Mh\CmsBundle\Entity\Website 
     */
    public function getWebsites()
    {
        return $this->websites;
    }

    /**
     * Set users
     *
     * @param Mh\UserBundle\Entity\User $users
     * @return WebsiteAllocation
     */
    public function setUsers(\Mh\UserBundle\Entity\User $users = null)
    {
        $this->users = $users;
    
        return $this;
    }

    /**
     * Get users
     *
     * @return Mh\UserBundle\Entity\User 
     */
    public function getUsers()
    {
        return $this->users;
    }
}