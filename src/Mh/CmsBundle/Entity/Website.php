<?php

namespace Mh\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Mh\CmsBundle\Entity\Website
 *
 * @ORM\Table(name="website")
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
     * @ORM\OneToMany(targetEntity="WebsiteAllocation", mappedBy="website")
     * @var ArrayCollection
     */
    //private $allocation;

    /**
     * @ORM\ManyToMany(targetEntity="Mh\UserBundle\Entity\User", inversedBy="websites");
     *
     * @var ArrayCollection
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="Mh\UserBundle\Entity\User", mappedBy="active_website")
     * @var ArrayCollection
     */
    private $active_users;

    /**
     * @ORM\ManyToMany(targetEntity="Mh\CmsBundle\Entity\WebsiteExternal", mappedBy="websites")
     * @var ArrayCollection
     */
    private $website_externals;

    /**
     * @ORM\OneToMany(targetEntity="Domain", mappedBy="website")
     * @var ArrayCollection
     */
    private $domain_names;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->active_users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->website_externals = new \Doctrine\Common\Collections\ArrayCollection();
        $this->domain_names = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getWebsiteName();
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
     * @param \Mh\CmsBundle\Entity\Page $pages
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
     * @param \Mh\CmsBundle\Entity\Page $pages
     */
    public function removePage(\Mh\CmsBundle\Entity\Page $pages)
    {
        $this->pages->removeElement($pages);
    }

    /**
     * Get pages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Add users
     *
     * @param \Mh\UserBundle\Entity\User $users
     * @return Website
     */
    public function addUser(\Mh\UserBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \Mh\UserBundle\Entity\User $users
     */
    public function removeUser(\Mh\UserBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add active_users
     *
     * @param \Mh\UserBundle\Entity\User $activeUsers
     * @return Website
     */
    public function addActiveUser(\Mh\UserBundle\Entity\User $activeUsers)
    {
        $this->active_users[] = $activeUsers;

        return $this;
    }

    /**
     * Remove active_users
     *
     * @param \Mh\UserBundle\Entity\User $activeUsers
     */
    public function removeActiveUser(\Mh\UserBundle\Entity\User $activeUsers)
    {
        $this->active_users->removeElement($activeUsers);
    }

    /**
     * Get active_users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActiveUsers()
    {
        return $this->active_users;
    }

    /**
     * Add website_externals
     *
     * @param \Mh\CmsBundle\Entity\WebsiteExternal $websiteExternals
     * @return Website
     */
    public function addWebsiteExternal(\Mh\CmsBundle\Entity\WebsiteExternal $websiteExternals)
    {
        $this->website_externals[] = $websiteExternals;

        return $this;
    }

    /**
     * Remove website_externals
     *
     * @param \Mh\CmsBundle\Entity\WebsiteExternal $websiteExternals
     */
    public function removeWebsiteExternal(\Mh\CmsBundle\Entity\WebsiteExternal $websiteExternals)
    {
        $this->website_externals->removeElement($websiteExternals);
    }

    /**
     * Get website_externals
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWebsiteExternals()
    {
        return $this->website_externals;
    }

    /**
     * Add domain_names
     *
     * @param \Mh\CmsBundle\Entity\Domain $domainNames
     * @return Website
     */
    public function addDomainName(\Mh\CmsBundle\Entity\Domain $domainNames)
    {
        $this->domain_names[] = $domainNames;
    
        return $this;
    }

    /**
     * Remove domain_names
     *
     * @param \Mh\CmsBundle\Entity\Domain $domainNames
     */
    public function removeDomainName(\Mh\CmsBundle\Entity\Domain $domainNames)
    {
        $this->domain_names->removeElement($domainNames);
    }

    /**
     * Get domain_names
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDomainNames()
    {
        return $this->domain_names;
    }
}