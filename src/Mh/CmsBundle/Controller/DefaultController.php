<?php

namespace Mh\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $handler = $this->get("mh.page.landing");

        return $this->render('MhCmsBundle:Page:published/' . $handler->generateIncludePath());
    }
}
