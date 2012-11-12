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
     * @var integer $allocation_current
     *
     * @ORM\Column(name="allocation_current", type="smallint")
     */
    private $allocation_current;
    
    /**
     * Holds the user to website allocation for this website.
     *
     * @ORM\ManyToOne(targetEntity="Website")
     * 
     * @var ArrayCollection
     */
    private $website;
    
    /**
     * Holds the user to website allocation for this website.
     *
     * @ORM\ManyToOne(targetEntity="Mh\UserBundle\Entity\User")
     * @var ArrayCollection
     */
    private $user;

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
     * Set allocation_owner
     *
     * @param integer $allocationOwner
     * @return WebsiteAllocation
     */
    public function setAllocationOwner($allocationOwner)
    {
        $this->allocation_owner = $allocationOwner;
    
        return $this;
    }

    /**
     * Get allocation_owner
     *
     * @return integer 
     */
    public function getAllocationOwner()
    {
        return $this->allocation_owner;
    }

    /**
     * Set allocation_current
     *
     * @param integer $allocationCurrent
     * @return WebsiteAllocation
     */
    public function setAllocationCurrent($allocationCurrent)
    {
        $this->allocation_current = $allocationCurrent;
    
        return $this;
    }

    /**
     * Get allocation_current
     *
     * @return integer 
     */
    public function getAllocationCurrent()
    {
        return $this->allocation_current;
    }

    /**
     * Set websites
     *
     * @param Mh\CmsBundle\Entity\Website $websites
     * @return WebsiteAllocation
     */
    public function setWebsite(\Mh\CmsBundle\Entity\Website $website = null)
    {
        $this->website = $website;
    
        return $this;
    }

    /**
     * Get websites
     *
     * @return Mh\CmsBundle\Entity\Website 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set users
     *
     * @param Mh\UserBundle\Entity\User $users
     * @return WebsiteAllocation
     */
    public function setUser(\Mh\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return Mh\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
    
    public function isCurrent()
    {
    	return $this->getAllocationCurrent();
    }
    
    public function isOwner()
    {
    	return $this->getAllocationOwner();
    }
}