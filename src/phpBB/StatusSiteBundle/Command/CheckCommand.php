<?php

namespace phpBB\StatusSiteBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CheckCommand extends Command {
	protected function configure() {
		$this->setName('pingdom:update')
				->setDescription(
						'Update the current site status of all pingdom checks');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$container = $this->getApplication()->getKernel()->getContainer();
		$output->writeln("Updating pingdom data");

		$sites = $container->get('doctrine')
				->getRepository('phpBBStatusSiteBundle:Sites');

		$all = $sites->findAll();
		$globalMajor = $globalMinor = false;

		for ($i = 0; $i < sizeof($all); $i++) {
			$localMajor = $localMinor = false;

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
			}
		}
	}
}
