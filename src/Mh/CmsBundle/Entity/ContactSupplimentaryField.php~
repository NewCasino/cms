<?php

namespace Mh\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mh\CmsBundle\Entity\ContactSupplimentaryField
 *
 * @ORM\Table(name="contact_supplimentary_field")
 * @ORM\Entity
 */
class ContactSupplimentaryField
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
     * @var string $contact_supplimentary_field_name
     *
     * @ORM\Column(name="contact_supplimentary_field_name", type="string", length=20)
     */
    private $contact_supplimentary_field_name;


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
     * Set contact_supplimentary_field_name
     *
     * @param string $contactSupplimentaryFieldName
     * @return ContactSupplimentaryField
     */
    public function setContactSupplimentaryFieldName($contactSupplimentaryFieldName)
    {
        $this->contact_supplimentary_field_name = $contactSupplimentaryFieldName;
    
        return $this;
    }

    /**
     * Get contact_supplimentary_field_name
     *
     * @return string 
     */
    public function getContactSupplimentaryFieldName()
    {
        return $this->contact_supplimentary_field_name;
    }
}