<?php

namespace Mh\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mh\CmsBundle\Entity\SocialMediaPlatform
 *
 * @ORM\Table(name="social_media_platform")
 * @ORM\Entity
 */
class SocialMediaPlatform
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
     * @var string $social_media_platform_name
     *
     * @ORM\Column(name="social_media_platform_name", type="string", length=50)
     */
    private $social_media_platform_name;


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
     * Set social_media_platform_name
     *
     * @param string $socialMediaPlatformName
     * @return SocialMediaPlatform
     */
    public function setSocialMediaPlatformName($socialMediaPlatformName)
    {
        $this->social_media_platform_name = $socialMediaPlatformName;
    
        return $this;
    }

    /**
     * Get social_media_platform_name
     *
     * @return string 
     */
    public function getSocialMediaPlatformName()
    {
        return $this->social_media_platform_name;
    }
}