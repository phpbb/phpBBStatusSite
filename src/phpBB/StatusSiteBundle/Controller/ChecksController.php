<?php

namespace phpBB\StatusSiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use phpBB\StatusSiteBundle\Entity\Checks;
use phpBB\StatusSiteBundle\Form\ChecksType;

/**
 * Checks controller.
 *
 */
class ChecksController extends Controller
{

    /**
     * Lists all Checks entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('phpBBStatusSiteBundle:Checks')->findAll();

        return $this->render('phpBBStatusSiteBundle:Checks:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Checks entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Checks();
        $form = $this->createForm(new ChecksType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_checks_show', array('id' => $entity->getId())));
        }

        return $this->render('phpBBStatusSiteBundle:Checks:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Checks entity.
     *
     */
    public function newAction()
    {
        $entity = new Checks();
        $form   = $this->createForm(new ChecksType(), $entity);

        return $this->render('phpBBStatusSiteBundle:Checks:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Checks entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('phpBBStatusSiteBundle:Checks')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Checks entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('phpBBStatusSiteBundle:Checks:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Checks entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('phpBBStatusSiteBundle:Checks')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Checks entity.');
        }

        $editForm = $this->createForm(new ChecksType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('phpBBStatusSiteBundle:Checks:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Checks entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('phpBBStatusSiteBundle:Checks')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Checks entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ChecksType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_checks_edit', array('id' => $id)));
        }

        return $this->render('phpBBStatusSiteBundle:Checks:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Checks entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('phpBBStatusSiteBundle:Checks')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Checks entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_checks'));
    }

    /**
     * Creates a form to delete a Checks entity by id.
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
