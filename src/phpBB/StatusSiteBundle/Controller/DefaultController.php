<?php

namespace phpBB\StatusSiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
	phpBB\StatusSiteBundle\Entity\Status,
	phpBB\StatusSiteBundle\Entity\Updates;

class DefaultController extends Controller
{
	public function indexAction()
	{
                $sites  = $this->getDoctrine()->getRepository('phpBBStatusSiteBundle:Sites');
		$status = $this	->getDoctrine()
						->getRepository('phpBBStatusSiteBundle:Status');

		$updates = $this	->getDoctrine()
							->getRepository('phpBBStatusSiteBundle:Updates');

		$overall_status = ($status->findOneByName('overall')) ?: 'Fully Operational';
		$last_check = ($status->findOneByName('last_check')) ?: time();
		$down_type = ($status->findOneByName('DowntimeType')) ?: 'Not Planned';

		$overall_status = 'Minor Outage';
//		$down_type = 'Planned';

		if ($overall_status == 'Fully Operational')
		{
			$downtime = false;
			$planned = false;
		}
		elseif ($overall_status == 'Major Outage' && $down_type != 'Planned')
		{
			$downtime = true;
			$planned = false;
		}
		elseif ($overall_status == 'Major Outage' && $down_type == 'Planned')
		{
			$downtime = true;
			$planned = true;
		}
		elseif ($overall_status == 'Minor Outage' && $down_type != 'Planned')
		{
			$downtime = true;
			$planned = false;
		}
		elseif ($overall_status == 'Minor Outage' && $down_type == 'Planned')
		{
			$downtime = true;
			$planned = true;
		}

		$template_vars = array(
			'status'		=> $overall_status, // Minor Outage, Major Outage or Fully Operational
			'last_check'            => $last_check,// Datetime of last check
			'updates'		=> $updates->findBy(array(), array('post_time' => 'desc'), 5, 0), // Array of updates (). Each top level element of the array contains all information about that update.
			'downtime'		=> $downtime, // 0 for up, 1 for
			'planned'		=> $planned,
			'sites'                 => $sites->findBy(array('front_page' => true)),
		);
		return $this->render('phpBBStatusSiteBundle:Default:index.html.twig', $template_vars);
	}

	public function siteAction($slug)
	{
            $sites  = $this->getDoctrine()->getRepository('phpBBStatusSiteBundle:Sites');

            $template = array(
                'site'  => $sites->findBySlug($slug)[0],
                'now'   => new \Datetime(),
            );

            return $this->render('phpBBStatusSiteBundle:Default:site.html.twig', $template);
	}
}
