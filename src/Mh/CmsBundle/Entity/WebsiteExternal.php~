<?php

namespace Mh\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WebsiteExternal
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class WebsiteExternal
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
     * @ORM\Column(name="website_external_import_string", type="string", length=255)
     */
    private $website_external_import_string;

    /**
     * @ORM\ManyToMany(targetEntity="Mh\CmsBundle\Entity\Website", inversedBy="website_externals")
     * @var ArrayCollection
     */
    private $websites;

    /**
     * @ORM\ManyToOne(targetEntity="Mh\CmsBundle\Entity\WebsiteExternalType", inversedBy="externals")
     * @var ArrayCollection
     */
    private $type;

    public function __construct()
    {
        $this->websites = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set website_external_import_string
     *
     * @param string $websiteExternalImportString
     * @return WebsiteExternal
     */
    public function setWebsiteExternalImportString($websiteExternalImportString)
    {
        $this->website_external_import_string = $websiteExternalImportString;

        return $this;
    }

    /**
     * Get website_external_import_string
     *
     * @return string
     */
    public function getWebsiteExternalImportString()
    {
        return $this->website_external_import_string;
    }

    /**
     * Add websites
     *
     * @param \Mh\CmsBundle\Entity\Website $websites
     * @return WebsiteExternal
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
     * Set type
     *
     * @param \Mh\CmsBundle\Entity\WebsiteExternalType $type
     * @return WebsiteExternal
     */
    public function setType(\Mh\CmsBundle\Entity\WebsiteExternalType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Mh\CmsBundle\Entity\WebsiteExternalType
     */
    public function getType()
    {
        return $this->type;
    }
}