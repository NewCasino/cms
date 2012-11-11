<?php

namespace Mh\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Mh\CmsBundle\Entity\Website
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Website
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
     * @var string $website_name
     *
     * @ORM\Column(name="website_name", type="string", length=30)
     */
    private $website_name;

    /**
     * @var integer $website_created_at
     *
     * @ORM\Column(name="website_created_at", type="integer")
     */
    private $website_created_at;

    /**
     * @var integer $website_renewal_date
     *
     * @ORM\Column(name="website_renewal_date", type="integer")
     */
    private $website_renewal_date;

    /**
     * @var integer $website_active
     *
     * @ORM\Column(name="website_active", type="smallint")
     */
    private $website_active;
    
    /**
     * Holds the pages that belong to this website.
     * 
     * @ORM\OneToMany(targetEntity="Page", mappedBy="website")
     * @var ArrayCollection
     */
    private $pages;
    
    /**
     * Holds the user to website allocation for this website.
     *
     * @ORM\OneToMany(targetEntity="WebsiteAllocation", mappedBy="users")
     * @var ArrayCollection
     */
    private $user_allocation;

    
	public function __construct()
	{
		$this->pages = new ArrayCollection;
		$this->user_allocation = new ArrayCollection;
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
     * Set website_name
     *
     * @param string $websiteName
     * @return Website
     */
    public function setWebsiteName($websiteName)
    {
        $this->website_name = $websiteName;
    
        return $this;
    }

    /**
     * Get website_name
     *
     * @return string 
     */
    public function getWebsiteName()
    {
        return $this->website_name;
    }

    /**
     * Set website_created_at
     *
     * @param integer $websiteCreatedAt
     * @return Website
     */
    public function setWebsiteCreatedAt($websiteCreatedAt)
    {
        $this->website_created_at = $websiteCreatedAt;
    
        return $this;
    }

    /**
     * Get website_created_at
     *
     * @return integer 
     */
    public function getWebsiteCreatedAt()
    {
        return $this->website_created_at;
    }

    /**
     * Set website_renewal_date
     *
     * @param integer $websiteRenewalDate
     * @return Website
     */
    public function setWebsiteRenewalDate($websiteRenewalDate)
    {
        $this->website_renewal_date = $websiteRenewalDate;
    
        return $this;
    }

    /**
     * Get website_renewal_date
     *
     * @return integer 
     */
    public function getWebsiteRenewalDate()
    {
        return $this->website_renewal_date;
    }

    /**
     * Set website_active
     *
     * @param integer $websiteActive
     * @return Website
     */
    public function setWebsiteActive($websiteActive)
    {
        $this->website_active = $websiteActive;
    
        return $this;
    }

    /**
     * Get website_active
     *
     * @return integer 
     */
    public function getWebsiteActive()
    {
        return $this->website_active;
    }

    /**
     * Add pages
     *
     * @param Mh\CmsBundle\Entity\Page $pages
     * @return Website
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
     * Add user_allocation
     *
     * @param Mh\CmsBundle\Entity\WebsiteAllocation $userAllocation
     * @return Website
     */
    public function addUserAllocation(\Mh\CmsBundle\Entity\WebsiteAllocation $userAllocation)
    {
        $this->user_allocation[] = $userAllocation;
    
        return $this;
    }

    /**
     * Remove user_allocation
     *
     * @param Mh\CmsBundle\Entity\WebsiteAllocation $userAllocation
     */
    public function removeUserAllocation(\Mh\CmsBundle\Entity\WebsiteAllocation $userAllocation)
    {
        $this->user_allocation->removeElement($userAllocation);
    }

    /**
     * Get user_allocation
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUserAllocation()
    {
        return $this->user_allocation;
    }
}