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
    private $allocation;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->allocation = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add allocation
     *
     * @param Mh\CmsBundle\Entity\WebsiteAllocation $allocation
     * @return User
     */
    public function addAllocation(\Mh\CmsBundle\Entity\WebsiteAllocation $allocation)
    {
    	$allocation->setUser($this);
    	
        $this->allocation[] = $allocation;
    
        return $this;
    }

    /**
     * Remove allocation
     *
     * @param Mh\CmsBundle\Entity\WebsiteAllocation $allocation
     */
    public function removeAllocation(\Mh\CmsBundle\Entity\WebsiteAllocation $allocation)
    {
        $this->allocation->removeElement($allocation);
    }

    /**
     * Get allocation
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getAllocation()
    {
        return $this->allocation;
    }
}