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
use Mh\CmsBundle\Entity\ContentBlock;

class Builder extends Handler
{
    /**
     * Creates a blank content block and sets the entity manager to persist it.
     * 
     * @return \Mh\CmsBundle\Entity\ContentBlock
     */
    private function createEmptyContentBlock()
    {
        $cb = new ContentBlock;
        $cb->setContentBlockContent("");
        $cb->setContentBlockRank(0);
        $this->getEm()->persist($cb);
        
        return $cb;
    }
    
    /**
     * Adds a sub content block.
     * 
     * @param array $data
     * @return ContentBlock The newly created sub block
     */
    public function addSubBlock(array $data)
    {       
        $cb = $this
            ->createEmptyContentBlock()
            ->setParent($this->fetchBlock($data["parent"]))
            ->setContentBlockContent($data["content_block_content"])
            ->setContentBlockType($this->fetchBlockType($data["content_block_type"]))
        ;
        
        $this->getEm()->flush();
        
        return $cb;
    }
    
    /**
     * Removes a child block from it's parent and destroys it.
     * 
     * @param integer $parentId
     * @param integer $blockId
     * @return void
     */
    public function removeSubBlock($blockId)
    {
        $block = $this->fetchBlock($blockId);
        $this->getEm()->remove($block);

        $this->getEm()->flush();
    }
}
