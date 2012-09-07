<?php

namespace phpBB\StatusSiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
	phpBB\StatusSiteBundle\Entity\Status,
	phpBB\StatusSiteBundle\Entity\Updates;
	//phpBB\StatusSiteBundle\Checks,
	//phpBB\StatusSiteBundle\User;

class DefaultController extends Controller
{
	public function indexAction()
	{
		$status = $this	->getDoctrine()
						->getRepository('phpBBStatusSiteBundle:Status');

		$updates = $this	->getDoctrine()
							->getRepository('phpBBStatusSiteBundle:Updates');

		//$checks = new Checks();

		//$user = new User();
		//
		$overall_status = $status->findOneByName('overall');
		$last_check = $status->findOneByName('last_check');

		if (!$overall_status)
		{
			$overall_status = "Fully Operational";
		}

		if (!$last_check) 
		{
			$last_check = time();
		}

		return $this->render('phpBBStatusSiteBundle:Default:index.html.twig', array(
			'status'		=> $overall_status, // Minor Outage, Major Outage or Fully Operational
			'last_check'	=> $last_check,// Datetime of last check
			'updates'		=> $updates->findAll(array('post_time' => 'DEC')), // Array of updates (). Each top level element of the array contains all information about that update.
			//'checks'		=> $checks->get_list(), // List of checks with brief information on 2nd level.
		));
	}
}
