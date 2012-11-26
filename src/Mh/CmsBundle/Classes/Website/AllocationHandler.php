<?php

namespace Mh\CmsBundle\Classes\Website;

use Mh\CmsBundle\Entity\WebsiteAllocation;
use Mh\CmsBundle\Entity\Website;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\SecurityContext;
use Mh\UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;

class AllocationException extends \Exception
{
}

/**
 * This class handles the business logic surrounding the
 * allocation of the current authed user to websites.
 * 
 * @author Mike Hart
 * 
 * @package CmsBundle
 * @subpackage Classes
 * 
 * @version 0.1
 */
class AllocationHandler
{
	/**
	 * Holds an instance of the current user.
	 * 
	 * @var User
	 */
	private $operator;
	
	/**
	 * Holds an instance of the security context for this 
	 * current session.
	 * 
	 * @var SecurityContext
	 */
	private $securityContext;
	
	/**
	 * Holds the allocation of websites for the current authed user.
	 * 
	 * @var ArrayCollection
	 */
	private $allocation;
	
	/**
	 * Holds a doctrine entity manager instance.
	 * 
	 * @var EntityManager
	 */
	private $entityManager;
	
	/**
	 * Populates the object.
	 * 
	 * @param SecurityContext $securityContext
	 * @return void
	 */
	public function __construct(SecurityContext $securityContext, EntityManager $em)
	{
		$this->securityContext = $securityContext;
		$this->operator = $this->securityContext->getToken()->getUser();
		$this->entityManager = $em;
		$this->entityManager->persist($this->operator);
	}
    
    /**
     * Sets the active website for a user.
     * 
     * @param int $websiteId
     * @return Mh\CmsBundle\Entity\Website
     * @throws AllocationException
     */
    public function setActiveSite($websiteId)
    {
        // Load website object
        $website = $this->entityManager
                        ->getRepository("MhCmsBundle:Website")
                            ->find($websiteId);
        
        // Check user has access to this object (throw if not)
        if (!$this->operator->getWebsites()->contains($website)) {
            throw new AllocationException("User cannot access this website");
        }
        
        // Update operator object
        $this->operator->setActiveWebsite($website);
        $this->entityManager->flush();
        
        return $website;
    }
}