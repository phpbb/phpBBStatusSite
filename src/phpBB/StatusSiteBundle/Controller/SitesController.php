<?php

namespace phpBB\StatusSiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use phpBB\StatusSiteBundle\Entity\Sites;
use phpBB\StatusSiteBundle\Form\SitesType;

/**
 * Sites controller.
 *
 */
class SitesController extends Controller
{

    /**
     * Lists all Sites entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('phpBBStatusSiteBundle:Sites')->findAll();

        return $this->render('phpBBStatusSiteBundle:Sites:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Sites entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Sites();
        $form = $this->createForm(new SitesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_sites_show', array('id' => $entity->getId())));
        }

        return $this->render('phpBBStatusSiteBundle:Sites:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Sites entity.
     *
     */
    public function newAction()
    {
        $entity = new Sites();
        $form   = $this->createForm(new SitesType(), $entity);

        return $this->render('phpBBStatusSiteBundle:Sites:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Sites entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('phpBBStatusSiteBundle:Sites')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sites entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('phpBBStatusSiteBundle:Sites:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Sites entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('phpBBStatusSiteBundle:Sites')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sites entity.');
        }

        $editForm = $this->createForm(new SitesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('phpBBStatusSiteBundle:Sites:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Sites entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('phpBBStatusSiteBundle:Sites')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sites entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SitesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_sites_edit', array('id' => $id)));
        }

        return $this->render('phpBBStatusSiteBundle:Sites:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Sites entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('phpBBStatusSiteBundle:Sites')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Sites entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_sites'));
    }

    /**
     * Creates a form to delete a Sites entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
