<?php

namespace Mh\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WebsiteExternalType
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class WebsiteExternalType
{
    const TYPE_CSS = "text/css";
    const TYPE_JS = "text/javascript";

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
     * @ORM\Column(name="website_external_type_name", type="string", length=20)
     */
    private $website_external_type_name;

    /**
     * @ORM\OneToMany(targetEntity="Mh\CmsBundle\Entity\WebsiteExternal", mappedBy="type")
     * @var ArrayCollection
     */
    private $externals;

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
     * Set website_external_type_name
     *
     * @param string $websiteExternalTypeName
     * @return WebsiteExternalType
     */
    public function setWebsiteExternalTypeName($websiteExternalTypeName)
    {
        $this->website_external_type_name = $websiteExternalTypeName;

        return $this;
    }

    /**
     * Get website_external_type_name
     *
     * @return string
     */
    public function getWebsiteExternalTypeName()
    {
        return $this->website_external_type_name;
    }

    /**
     * Add externals
     *
     * @param \Mh\CmsBundle\Entity\WebsiteExternal $externals
     * @return WebsiteExternalType
     */
    public function addExternal(\Mh\CmsBundle\Entity\WebsiteExternal $externals)
    {
        $this->externals[] = $externals;

        return $this;
    }

    /**
     * Remove externals
     *
     * @param \Mh\CmsBundle\Entity\WebsiteExternal $externals
     */
    public function removeExternal(\Mh\CmsBundle\Entity\WebsiteExternal $externals)
    {
        $this->externals->removeElement($externals);
    }

    /**
     * Get externals
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExternals()
    {
        return $this->externals;
    }
}