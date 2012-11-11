<?php

namespace Mh\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\OneToMany(targetEntity="Mh\CmsBundle\Entity\WebsiteAllocation", mappedBy="websites")
     * @var ArrayCollection
     */
    private $website_allocation;

    public function __construct()
    {
        parent::__construct();
        // your own logic
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
     * @param Mh\CmsBundle\Entity\WebsiteAllocation $websites
     * @return User
     */
    public function addWebsite(\Mh\CmsBundle\Entity\WebsiteAllocation $websites)
    {
        $this->websites[] = $websites;
    
        return $this;
    }

    /**
     * Remove websites
     *
     * @param Mh\CmsBundle\Entity\WebsiteAllocation $websites
     */
    public function removeWebsite(\Mh\CmsBundle\Entity\WebsiteAllocation $websites)
    {
        $this->websites->removeElement($websites);
    }

    /**
     * Get websites
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getWebsites()
    {
        return $this->websites;
    }
}