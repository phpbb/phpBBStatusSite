<?php

namespace phpBB\StatusSiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
	phpBB\StatusSiteBundle\Entity\Status,
	phpBB\StatusSiteBundle\Entity\Updates;

class DefaultController extends Controller
{
	public function indexAction()
	{
		$status = $this	->getDoctrine()
						->getRepository('phpBBStatusSiteBundle:Status');

		$updates = $this	->getDoctrine()
							->getRepository('phpBBStatusSiteBundle:Updates');

		$overall_status = ($status->findOneByName('overall')) ?: 'Fully Operational';
		$last_check = ($status->findOneByName('last_check')) ?: time();
		$down_type = ($status->findOneByName('DowntimeType')) ?: 0;

		if ($overall_status == 'Fully Operational')
		{
			$downtime = 0;
			$planned = false;
		}
		elseif ($overall_status == 'Major Outage' && $down_type != 'Planned')
		{
			$downtime = 1;
			$planned = false;
		}
		elseif ($overall_status == 'Major Outage' && $down_type == 'Planned')
		{
			$downtime = 2;
			$planned = true;
		}
		elseif ($overall_status == 'Minor Outage' && $down_type != 'Planned')
		{
			$downtime = 3;
			$planned = false;
		}
		elseif ($overall_status == 'Minor Outage' && $down_type == 'Planned')
		{
			$downtime = 4;
			$planned = true;
		}

		$updates_all = $updates->findAll();
		$show = ($status->findOneByName('show_no')) ?: 5;

		for($i = 0; $i == $show; $i++)
		{
                    // No idea what micheal means here, no fixing possible.
			//$updates_parsed[$i], $updates_all[$i];
		}

		$template_vars = array(
			'status'		=> $overall_status, // Minor Outage, Major Outage or Fully Operational
			'last_check'	=> $last_check,// Datetime of last check
			'updates'		=> $updates->findAll(array('post_time' => 'DEC')), // Array of updates (). Each top level element of the array contains all information about that update.
			//'checks'		=> $checks->get_list(), // List of checks with brief information on 2nd level.
			'downtime'		=> $downtime, // 0 for up, 1 for
			'planned'		=> $planned,
		);
		return $this->render('phpBBStatusSiteBundle:Default:index.html.twig', $template_vars);
	}
}
