<?php

namespace Mh\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mh\CmsBundle\Entity\ContactType
 *
 * @ORM\Table(name="contact_type")
 * @ORM\Entity
 */
class ContactType
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
     * @var string $contact_type_name
     *
     * @ORM\Column(name="contact_type_name", type="string", length=15)
     */
    private $contact_type_name;




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
     * Set contact_type_name
     *
     * @param string $contactTypeName
     * @return ContactType
     */
    public function setContactTypeName($contactTypeName)
    {
        $this->contact_type_name = $contactTypeName;

        return $this;
    }

    /**
     * Get contact_type_name
     *
     * @return string
     */
    public function getContactTypeName()
    {
        return $this->contact_type_name;
    }
}