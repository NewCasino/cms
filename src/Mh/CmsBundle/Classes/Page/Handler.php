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
use Symfony\Component\Security\Core\SecurityContext;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PageCreationFailedExeption extends \Exception
{
}

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
	public function __construct(SecurityContext $securityContext, EntityManager $em, ContainerInterface $container)
	{
		$this->securityContext = $securityContext;
		$this->operator = $this->securityContext->getToken()->getUser();
		$this->entityManager = $em;
		$this->entityManager->persist($this->operator);
        
        $pageId = $container->get("request")->attributes->get("pageId");
        
        if ($pageId)
            $this->page = $this->fetchPage($pageId);
	}
    
    public function getURIGenerator()
    {
        return new URIGenerator();
    }
    
    public function getOperator()
    {
        return $this->operator;
    }
    
    /**
     * Fetch a block instance from the db.
     * 
     * @param integer $blockId
     * @return \Mh\CmsBundle\Entity\ContentBlock
     */
    public function fetchBlock($blockId)
    {
        $repo = $this->entityManager->getRepository("MhCmsBundle:ContentBlock");
        $block = $repo->find($blockId);
        //$this->entityManager->persist($block);
        
        return $block;
    }
    
    /**
     * Fetch a block instance from the db.
     * 
     * @param integer $blockTypeId
     * @return \Mh\CmsBundle\Entity\ContentBlockType
     */
    public function fetchBlockType($blockTypeId)
    {
        $repo = 
            $this->entityManager->getRepository("MhCmsBundle:ContentBlockType");
        
        return $repo->find($blockTypeId);
    }
    
    /**
     * Retrieve a page by id.
     * 
     * @param integer $id
     * @return Page
     */
    private function fetchPage($id)
    {
        $this->page = $this->entityManager->getRepository("MhCmsBundle:Page")->find($id);
        $this->entityManager->persist($this->page);
        
        return $this->page;
    }
    
    /**
     * Queries the db for all pages in the current operators active website.
     * 
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function fetchAll()
    {
        return $this->entityManager
                ->getRepository("MhCmsBundle:Page")
                ->findBy(array(
                    "website" => $this->operator->getActiveWebsite())
                );
    }
    
    public function getPage()
    {
        return $this->page;
    }
    
    public function getEm()
    {
        return $this->entityManager;
    }

    /**
     * Creates a page instance.
     * 
     * @todo Move to Builder class.
     * @param string $name The name of the page to be created.
     * @param integer|null $pageMaxChildren Max children for page. Default is 10.
     * @param Page|null $parent The parent of the new page.
     * @return Page New pre configured page isntance.
     */
    public function createPage($name, $pageMaxChildren = 10, Page $parent = null)
    {
        $prefix = null;
        
        if ($parent instanceof Page)
            $prefix = $parent->getPageUri();
        
        $pageUri = $this->getURIGenerator()
                        ->setPayload($name)
                        ->setPrefix($prefix)
                        ->process();
               
        try {
            $this->page = new Page();
            $this->entityManager->persist($this->page);
            $this->page->setPageMaxChildren($pageMaxChildren);
            $this->page->setPageParent($parent);
            $this->page->setPageUri($pageUri);
            $this->page->setPageName($name);
            $this->page->setWebsite($this->operator->getActiveWebsite());
            $this->entityManager->flush();
        } catch (Mh\CmsBundle\Classes\Page\MissingPayloadException $e) {
            throw new PageCreationFailedExeption($e->getMessage());
        }

        return $this->page;
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
