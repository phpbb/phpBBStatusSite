<?php

namespace phpBB\StatusSiteBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use phpBB\StatusSiteBundle\Entity\Status;

class CheckCommand extends Command {
	private $output;

	const INIT = 0;
	const UP = 1;
	const DOWN = 2;
	const UNKNOWN = 3;

	protected function configure() {
		$this->setName('pingdom:update')
				->setDescription(
						'Update the current site status of all pingdom checks');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$container = $this->getApplication()->getKernel()->getContainer();
		$this->output = $output;

		$output->writeln("Updating pingdom data");
		$em = $container->get('doctrine')->getEntityManager();

		$sites = $container->get('doctrine')
				->getRepository('phpBBStatusSiteBundle:Sites');

		$all = $sites->findAll();
		$globalMajor = $globalMinor = false;

		for ($i = 0; $i < sizeof($all); $i++) {
			$localMajor = $localMinor = false;
			$sitest = self::INIT;
			$sitestatus = "Unknown";

			$site = $all[$i];
			$output->writeln("Updating checks for site " . $site->getName());

			$checks = $site->getChecks();

			foreach ($checks as $check) {
				$output
						->writeln(
								"Contacting pingdom for check "
										. $check->getName());

				$pingdom = $check->getPingdomId();
				if (empty($pingdom)) {
					$output
							->writeln(
									"Missing pingdom ID. Please assign it in the admin panel");
					continue;
				}

				$status = $this->checkId($pingdom);

				if ($status === false) {
					$status = array('check' => array(
								'lasttesttime' => time(),
								'lastresponsetime' => -1,
								'status' => 'down',
							)
						);
				}

				$up = false;

				switch ($status['check']['status']) {
				case 'down':
				case 'unconfirmed_down':
					$st = 'Down';

					$sitest = self::DOWN;
					$sitestatus = $st;
					break;
				case 'unknown':
					$st = 'Unknown';
					$sitest = self::UNKNOWN;
					$sitestatus = $st;
					break;
				case 'paused':
					$st = 'Paused';
					$up = true; // Might change this to false?	

					$sitestatus = $st;

					break;
				case 'up':
					$st = 'Up';
					$up = true;

					// Only update the global site status when
					// there is no other check set to down!
					if ($sitest <= self::UP) {
						$sitest = self::UP;
						$sitestatus = 'Up';
					}

					break;
				default:
					$output
							->writeln(
									"Unknown status: "
											. $status['check']['status']);
				}

				$output->writeln("Status: " . $st . " Up: " . (int) $up);

				if ($st != $check->getStatus()
						|| $up != $check->getStatusCode()) {
					// Going to send a email O_o_O
					$output->writeln("Status change, sending mail...");
				} else {
					$output->writeln("No status change.");
				}
				if ($site->getMajor()) {
					$localMajor = $localMajor || !$up;
					$globalMajor = $globalMajor || !$up;
				} else {
					$localMinor = $localMinor || !$up;
					$globalMinor = $globalMinor || !$up;
				}
				// Update entity
				$check->setStatus($st);
				$check->setStatusCode($up);
				$check
						->setCheckTime(
								new \DateTime(
										'@' . $status['check']['lasttesttime']));

				$em->persist($check);
			}
			$output->writeln("Finished site, updating status");
			$site->setStatusCode($sitest == self::UP);
			$site->setStatus($sitestatus);
			$em->persist($site);
		}
		$output
				->writeln(
						"Finished updating site and checks, updating database");

		$status = $container->get('doctrine')
				->getRepository('phpBBStatusSiteBundle:Status');
		$overall = ($status->findOneByName('overall'));
		if (!$overall) {
			$overall = new Status();
			$overall->setName('overall');
		}

		if ($globalMajor || $globalMinor) {
			$overall->setValue(1);
		} else {
			$overall->setValue(0);
		}

		$type = ($status->findOneByName('major'));
		if (!$type) {
			$type = new Status();
			$type->setName('major');
		}
		if ($globalMajor) {
			$type->setValue(1);
		} else {
			$type->setValue(0);
		}

		$last = ($status->findOneByName('last'));
		if (!$last) {
			$last = new Status();
			$last->setName('last');
		}
		$last->setValue(time());

		$planned = ($status->findOneByName('planned'));
		if (!$planned) {
			$planned = new Status();
			$planned->setName('planned');
		}
		$planned->setValue(0);

		$em->persist($planned);
		$em->persist($last);
		$em->persist($type);
		$em->persist($overall);

		$em->flush();
	}

	/**
	 * Ask the pingdom API the current status of the check.
	 * @param int check id.
	 * @return mixed
	 */
	private function checkId($id) {
		$container = $this->getApplication()->getKernel()->getContainer();

		// Init cURL
		$curl = curl_init();
		// Set target URL
		curl_setopt($curl, CURLOPT_URL,
				"https://api.pingdom.com/api/2.0/checks/" . $id);
		// Set the desired HTTP method (GET is default, see the documentation for each request)
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		// Set user (email) and password
		
		$this->output->writeln("pass: " . $container->getParameter("pingdom_password"));
		
		curl_setopt($curl, CURLOPT_USERPWD,
				$container->getParameter("pingdom_user") . ":"
						. $container->getParameter("pingdom_password"));
						
		// Add a http header containing the application key (see the Authentication section of this document)
		curl_setopt($curl, CURLOPT_HTTPHEADER,
				array(
					"App-Key: " . $container->getParameter("pingdom_token"),
				));
		// Ask cURL to return the result as a string
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		// Set timeout on the pingdom call
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
		
		
		
		//REMOVE ME!!!!!!!
		// curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_VERBOSE, true);

		$data = curl_exec($curl);

		if ($data === false) {
			$this->output
					->writeln(
							"There has been a cURL error: " . curl_error($curl));
			return false;
		}

		// Execute the request and decode the json result into an associative array
		$response = json_decode($data, true);

		return $response;
	}
}
