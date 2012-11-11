<?php

namespace Mh\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MhUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
