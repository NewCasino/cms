<?php

namespace Mh\UserBundle\Controller;

use Mh\CmsBundle\Classes\Website\AllocationHandler;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$user = $this->getUser();
    	$em = $this->getDoctrine()->getEntityManager();
    	$allocationHandler = new AllocationHandler($this->get("security.context"), $em);
    	
   		$list = $allocationHandler->getAvailableUsers();
   		
   		// @todo: Render the view here and pass through $list
   		return $this->render();
    }
}
