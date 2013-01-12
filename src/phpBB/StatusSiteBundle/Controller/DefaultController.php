<?php

namespace phpBB\StatusSiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller, phpBB\StatusSiteBundle\Entity\Status, phpBB\StatusSiteBundle\Entity\Updates;

class DefaultController extends Controller {
	public function indexAction() {
		$sites = $this->getDoctrine()
				->getRepository('phpBBStatusSiteBundle:Sites');
		$status = $this->getDoctrine()
				->getRepository('phpBBStatusSiteBundle:Status');

		$updates = $this->getDoctrine()
				->getRepository('phpBBStatusSiteBundle:Updates');

		$downtime = (boolean) $status->findOneByName('overall')->getValue();
		$major = $status->findOneByName('major')->getValue();
		$time = $status->findOneByName('last')->getValue();
		$planned = $status->findOneByName('planned')->getValue();

		$text = 'Everything operational';

		if ($downtime) {
			if ($major) {
				$text = 'Major ';
			} else {
				$text = 'Minor ';
			}
			if ($planned) {
				$text .= 'planned ';
			}
			$text .= 'downtime';

		}

		$template_vars = array(
				'status' => $text,
				// Minor Outage, Major Outage or Fully Operational
				'last_check' => $time,
				// Datetime of last check
				'updates' => $updates
						->findBy(array(), array('post_time' => 'desc'), 5, 0),
				// Array of updates (). Each top level element of the array contains all information about that update.
				'downtime' => $downtime, // 0 for up, 1 for
				'planned' => $planned, 
				'major' => $major,
				'sites' => $sites->findBy(array('front_page' => true)),);
		return $this
				->render('phpBBStatusSiteBundle:Default:index.html.twig',
						$template_vars);
	}

	public function siteAction($slug) {
		$sites = $this->getDoctrine()
				->getRepository('phpBBStatusSiteBundle:Sites');

		$template = array('site' => $sites->findBySlug($slug)[0],
				'now' => new \Datetime(),);

		return $this
				->render('phpBBStatusSiteBundle:Default:site.html.twig',
						$template);
	}
}
