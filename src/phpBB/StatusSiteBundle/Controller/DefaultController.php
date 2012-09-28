<?php

namespace phpBB\StatusSiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('phpBBStatusSiteBundle:Default:index.html.twig', array('name' => $name));
    }
}
