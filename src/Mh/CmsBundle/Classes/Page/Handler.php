<?php

/**
 * Description of Handler
 *
 * @author Mike Hart
 * @version 0.1
 * @copyright (c) 2012, Mike Hart
 * 
 * @package CmsBundle
 * @subpackage Page
 */

namespace Mh\CmsBundle\Classes\Page;

use Mh\CmsBundle\Entity\Page;
use Mh\CmsBundle\Classes\Page\URIGenerator;
use Mh\UserBundle\Entity\User;

class Handler
{
    /**
     * Holds a page instance.
     * 
     * @var Page 
     */
    private $page;
    
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
    
    public function getURIGenerator()
    {
        return new URIGenerator();
    }

    /**
     * Creates a page instance.
     * 
     * @return Page New pre configured page isntance.
     */
    public function createPage($name, $pageMaxChildren = 10, Page $parent = null)
    {
        $this->page = new Page();
        $this->entityManager->persist($this->page);
        $this->page->setPageMaxChildren($pageMaxChildren);
        //$this->page->setPa
        
    }

    /**
     * Set the page.
     * 
     * @param \Mh\CmsBundle\Entity\Page $page
     */
    public function setPage(Page $page)
    {
        $this->page = $page;
    }
}
