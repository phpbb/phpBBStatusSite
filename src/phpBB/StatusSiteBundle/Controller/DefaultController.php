<?php

namespace phpBB\StatusSiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('phpBBStatusSiteBundle:Default:index.html.twig');
    }
}
