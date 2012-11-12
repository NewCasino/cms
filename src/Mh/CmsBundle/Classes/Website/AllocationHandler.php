<?php

namespace Mh\CmsBundle\Classes\Website;

use Mh\CmsBundle\Entity\WebsiteAllocation;
use Mh\CmsBundle\Entity\Website;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\SecurityContext;
use Mh\UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;

class NoAllocationException extends \Exception
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
		$this->allocation = $this->operator->getAllocation();
		$this->entityManager->persist($this->operator);
		
		$this->checkAllocation();
	}
	
	/**
	 * Allocates the operator to a given website.
	 * 
	 * @param Website $website
	 * @return WebsiteAllocation
	 */
	public function allocateToWebsite(Website $website)
	{
		$allocation = new WebsiteAllocation();		
		$allocation->setWebsite($website);
		$allocation->setAllocationCurrent(true);
		$allocation->setAllocationOwner(true);
		
		$this->operator->addAllocation($allocation);
		$this->entityManager->flush();
		
		return $allocation;
	}
	
	/**
	 * Removes an allocation from the current operator.
	 * 
	 * @param Website $website
	 */
	public function removeFromWebsite(Website $website)
	{
		foreach ($this->operator->getAllocation() as $allocation) {
			if ($allocation->getWebsite() === $website) {
				$this->entityManager->remove($allocation);
				$this->entityManager->flush();
				
				return;
			}
		}
	}
	
	/**
	 * Gets the current allocation for a user.
	 * 
	 * @throws NoAllocationException
	 * @return ArrayCollection
	 */
	public function getCurrentAllocation()
	{
		foreach ($this->allocation as $allocation) {
			if ($allocation->isCurrent()) {
				return $allocation;
			}
		}
		
		// If we've arrived here, we know that the user does not have an allocation.
		// Condition: Is the user a super admin?
		if (!$this->operator->hasRole("ROLE_SUPER_ADMIN"))
			throw new NoAllocationException("User has no current allocation.");
	}
	
	/**
	 * Gets the users available to an operator. A list will be returned based on
	 * the following constraints:
	 * 
	 * 1. 	If the user is a ROLE_SUPER_ADMIN, return all users.
	 * 2. 	If the user is not a ROLE_SUPER_ADMIN, get the current website and return
	 * 		a list of users based on this.
	 * 
	 * @return ArrayCollection
	 */
	public function getAvailableUsers()
	{
		if ($this->operator->hasRole("ROLE_SUPER_ADMIN")) {
			$users = $this->entityManager->getRepository("MhUserBundle:User")->findAll();
			
			// Take the results and add to an ArrayCollection so that we know we're
			// always returning the same data type.
			$list = new ArrayCollection();
			
			foreach ($users as $user) {
				$list->add($user);
			}
		} else {
			$list = $this->getCurrentAllocation()->getWebsite()->getAllocation()->getUsers();
		}

		return $list;
	}
	
	public function checkAllocation()
	{
		$allocation = $this->operator->getAllocation();
		$user = $this->operator;
		
		if ($allocation->count() == 0 && !$user->hasRole("ROLE_SUPER_ADMIN"))
			throw new NoAllocationException("User has no allocation.");
	}
}