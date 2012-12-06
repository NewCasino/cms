<?php

/**
 * Encapsulates business logic to handle what happens when the end user lands
 * on the application.
 *
 * @author Mike Hart
 * @version 0.1
 * @copyright (c) 2012, Mike Hart
 *
 * @package CmsBundle
 * @subpackage Classes
 */

namespace Mh\CmsBundle\Classes\Page;

use Mh\CmsBundle\Entity\Website;
use Symfony\Component\Security\Core\SecurityContext;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Mh\CmsBundle\Entity\Domain;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Landing extends Handler
{
    /**
     * Holds a website instance.
     *
     * @var Website
     */
    private $website;

    /**
	 * Populates the object.
	 *
	 * @param SecurityContext $securityContext
	 * @return void
	 */
	public function __construct(SecurityContext $securityContext, EntityManager $em, ContainerInterface $container)
	{
		parent::__construct($securityContext, $em, $container);
        $this->website = $this->fetchWebsite();
        $this->setPage($this->fetchPageByWebsite());
	}

    public function generateIncludePath()
    {
        $fs = new \Symfony\Component\Filesystem\Filesystem;

        // Generate the path.
        $sitePart = strtolower(str_replace(" ", "_", $this->website->getWebsiteName()));
        $pagePart = strtolower(str_replace(" ", "_", $this->getPage()->getPageName()));
        $path = __DIR__ . "/../../Resources/views/Page/published/" . $sitePart . "/" . $pagePart . ".html.twig";

        // Check that the path exists.
        $exists = $fs->exists($path);

        // If it does not, throw else return path
        if (!$exists) {
            throw new NotFoundHttpException;
        }

        return $sitePart . "/" . $pagePart . ".html.twig";
    }

    /**
     * Retreive a website object, using the domain name.
     *
     * @return Website
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function fetchWebsite()
    {
        $host = $this->getRequest()->getHost();
        $domain = $this->getEm()->getRepository("MhCmsBundle:Domain")->findOneBy(array("domain_name" => $host));

        if (!($domain instanceof Domain)) {
            throw new NotFoundHttpException;
        }

        return $domain->getWebsite();
    }

    /**
     * Get a page by the URI and selected website.
     *
     * @return Page
     * @throws NotFoundHttpException
     */
    protected function fetchPageByWebsite()
    {
        $uri = $this->getRequest()->getRequestUri();
        $params = array("website" => $this->website, "page_uri" => $uri);
        $page = $this->getEm()->getRepository("MhCmsBundle:Page")->findOneBy($params);

        if (!$page) {
            throw new NotFoundHttpException;
        }

        return $page;
    }
}
