<?php

namespace phpBB\StatusSiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
	public function warningAction()
	{
		$config = $this->getDoctrine()
			->getRepository('phpBBStatusSiteBundle:Config');

		$output = array(
			'active' => $config->find('downtimeWarningActive')->getConfigValue(),
			'name' => $config->find('downtimeWarningName')->getConfigValue(),
			'content' => $config->find('downtimeWarningContent')->getConfigValue(),
			'link' => $config->find('downtimeReadMoreLink')->getConfigValue()
		);

		$jsonOutput = json_encode($output);

		$headers = array(
			'Content-Type' => 'application/json'
		);

		$response = new Response($jsonOutput, 200, $headers);

		return $response;
	}
}
