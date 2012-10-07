<?php

namespace phpBB\StatusSiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
	phpBB\StatusSiteBundle\StatusInformation,
	phpBB\StatusSiteBundle\Updates,
	phpBB\StatusSiteBundle\Checks,
	phpBB\StatusSiteBundle\User;

class DefaultController extends Controller
{
	public function indexAction()
	{
		$status = new StatusInformation();

		$updates = new Updates();
		$updates->set_numberUpdates(7);

		$checks = new Checks();

		$user = new User();

		return $this->render('phpBBStatusSiteBundle:Default:index.html.twig', array(
			'status'		=> $status->get_overall("String"), // Minor Outage, Major Outage or Fully Operational
			'last_check'	=> $status->get_last_check(), // Datetime of last check
			'updates'		=> $updates->get_updates(), // Array of updates (number of updates = Ln 18). Each top level element of the array contains all information about that update.
			'checks'		=> $checks->get_list(), // List of checks with brief information on 2nd level.
		));
	}
}
