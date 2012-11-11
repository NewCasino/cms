<?php

namespace Mh\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mh\CmsBundle\Entity\Contact
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Contact
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
     * @var string $contact_contactee
     *
     * @ORM\Column(name="contact_contactee", type="string", length=50)
     */
    private $contact_contactee;

    /**
     * @var string $contact_address_1
     *
     * @ORM\Column(name="contact_address_1", type="string", length=100)
     */
    private $contact_address_1;

    /**
     * @var string $contact_address_2
     *
     * @ORM\Column(name="contact_address_2", type="string", length=50)
     */
    private $contact_address_2;

    /**
     * @var string $contact_town
     *
     * @ORM\Column(name="contact_town", type="string", length=50)
     */
    private $contact_town;

    /**
     * @var string $contact_county
     *
     * @ORM\Column(name="contact_county", type="string", length=50)
     */
    private $contact_county;

    /**
     * @var string $contact_country
     *
     * @ORM\Column(name="contact_country", type="string", length=50)
     */
    private $contact_country;


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
     * Set contact_contactee
     *
     * @param string $contactContactee
     * @return Contact
     */
    public function setContactContactee($contactContactee)
    {
        $this->contact_contactee = $contactContactee;
    
        return $this;
    }

    /**
     * Get contact_contactee
     *
     * @return string 
     */
    public function getContactContactee()
    {
        return $this->contact_contactee;
    }

    /**
     * Set contact_address_1
     *
     * @param string $contactAddress1
     * @return Contact
     */
    public function setContactAddress1($contactAddress1)
    {
        $this->contact_address_1 = $contactAddress1;
    
        return $this;
    }

    /**
     * Get contact_address_1
     *
     * @return string 
     */
    public function getContactAddress1()
    {
        return $this->contact_address_1;
    }

    /**
     * Set contact_address_2
     *
     * @param string $contactAddress2
     * @return Contact
     */
    public function setContactAddress2($contactAddress2)
    {
        $this->contact_address_2 = $contactAddress2;
    
        return $this;
    }

    /**
     * Get contact_address_2
     *
     * @return string 
     */
    public function getContactAddress2()
    {
        return $this->contact_address_2;
    }

    /**
     * Set contact_town
     *
     * @param string $contactTown
     * @return Contact
     */
    public function setContactTown($contactTown)
    {
        $this->contact_town = $contactTown;
    
        return $this;
    }

    /**
     * Get contact_town
     *
     * @return string 
     */
    public function getContactTown()
    {
        return $this->contact_town;
    }

    /**
     * Set contact_county
     *
     * @param string $contactCounty
     * @return Contact
     */
    public function setContactCounty($contactCounty)
    {
        $this->contact_county = $contactCounty;
    
        return $this;
    }

    /**
     * Get contact_county
     *
     * @return string 
     */
    public function getContactCounty()
    {
        return $this->contact_county;
    }

    /**
     * Set contact_country
     *
     * @param string $contactCountry
     * @return Contact
     */
    public function setContactCountry($contactCountry)
    {
        $this->contact_country = $contactCountry;
    
        return $this;
    }

    /**
     * Get contact_country
     *
     * @return string 
     */
    public function getContactCountry()
    {
        return $this->contact_country;
    }
}