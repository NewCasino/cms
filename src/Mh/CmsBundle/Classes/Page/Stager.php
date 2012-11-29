<?php

/**
 * Encapsulates business logic for the rendering of a page.
 *
 * @author Mike Hart
 * @version 0.1
 * @copyright (c) 2012, Mike Hart
 * 
 * @package CmsBundle
 * @subpackage Classes
 */

namespace Mh\CmsBundle\Classes\Page;

use Mh\CmsBundle\Entity\Page;
use Mh\CmsBundle\Classes\Page\Handler;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

class Stager extends Handler
{   
    /**
     * Get all the content block types.
     * 
     * @return array
     */
    public function getContentBlockTypes()
    {
        return $this->getEm()->getRepository("MhCmsBundle:ContentBlockType")->findAll();
    }
}
