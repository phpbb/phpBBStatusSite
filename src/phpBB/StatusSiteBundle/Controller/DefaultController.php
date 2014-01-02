<?php

namespace phpBB\StatusSiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use phpBB\StatusSiteBundle\Entity\Status;
use phpBB\StatusSiteBundle\Entity\Updates;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use phpBB\StatusSiteBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{
    public function indexAction()
    {
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

        $template_vars = array('status' => $text,
                // Minor Outage, Major Outage or Fully Operational
                'last_check' => $time,
                // Datetime of last check
                'updates' => $updates
                        ->findBy(array(), array('post_time' => 'desc'), 5, 0),
                // Array of updates (). Each top level element of the array contains all information about that update.
                'downtime' => $downtime, // 0 for up, 1 for
                'planned' => $planned, 'major' => $major,
                'sites' => $this->getSites(),);

        return $this
                ->render('phpBBStatusSiteBundle:Default:index.html.twig',
                        $template_vars);
    }

    private function getSites()
    {
        $sites = $this->getDoctrine()
                ->getRepository('phpBBStatusSiteBundle:Sites');
        if ($this->container->get('security.context')
                ->isGranted('IS_AUTHENTICATED_FULLY')) {
            $site = $sites->findBy(array('front_page' => true));
        } else {
            $site = $sites
                    ->findBy(array('front_page' => true, 'team' => false));
        }

        return $site;
    }

    public function contactAction()
    {
        $form = $this->get('form.factory')->create(new ContactType());

        $request = $this->get('request');
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            if ($form->isValid()) {
                $data = $form->getData();

                $message = \Swift_Message::newInstance()
                ->setSubject('Status contact from ' . $data['email'])
                ->setFrom($data['email'])
                ->setTo('phpbbdown@phpbb.xxx')
                ->setBody(
                        $this->renderView(
                                'phpBBStatusSiteBundle:Default:email.txt.twig',
                                array('message' => htmlspecialchars($data['message']))
                        )
                )
                ;
                $this->get('mailer')->send($message);

                $this->get('session')->getFlashBag()->set('notice', 'Message sent!');

                return new RedirectResponse($this->generateUrl('homepage'));
            }
        }

        return $this
                ->render('phpBBStatusSiteBundle:Default:contact.html.twig',
                        array('sites' => $this->getSites(),
                                'form' => $form->createView()));
    }

    public function siteAction($slug)
    {
        $sites = $this->getDoctrine()
                ->getRepository('phpBBStatusSiteBundle:Sites');
        $site = $sites->findBySlug($slug);
        if (!$site
                || ($site[0]->getTeam()
                        && !$this->container->get('security.context')
                                ->isGranted('IS_AUTHENTICATED_FULLY'))) {
            throw new NotFoundHttpException();
        }

        $template = array('site' => $site[0], 'now' => new \Datetime(),);

        return $this
                ->render('phpBBStatusSiteBundle:Default:site.html.twig',
                        $template);
    }
}
