<?php

namespace Mh\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Domain
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Domain
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
     * @ORM\Column(name="domain_name", type="string", length=255)
     */
    private $domain_name;

    /**
     * @ORM\ManyToOne(targetEntity="Website")
     * @var Website
     */
    private $website;


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
     * Set domain_name
     *
     * @param string $domainName
     * @return Domain
     */
    public function setDomainName($domainName)
    {
        $this->domain_name = $domainName;

        return $this;
    }

    /**
     * Get domain_name
     *
     * @return string
     */
    public function getDomainName()
    {
        return $this->domain_name;
    }

    /**
     * Set website
     *
     * @param \Mh\CmsBundle\Entity\Website $website
     * @return Domain
     */
    public function setWebsite(\Mh\CmsBundle\Entity\Website $website = null)
    {
        $this->website = $website;
    
        return $this;
    }

    /**
     * Get website
     *
     * @return \Mh\CmsBundle\Entity\Website 
     */
    public function getWebsite()
    {
        return $this->website;
    }
}