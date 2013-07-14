<?php

namespace phpBB\StatusSiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use phpBB\StatusSiteBundle\Entity\Overides;
use phpBB\StatusSiteBundle\Form\OveridesType;

/**
 * Overides controller.
 *
 */
class OveridesController extends Controller
{

    /**
     * Lists all Overides entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('phpBBStatusSiteBundle:Overides')->findAll();

        return $this->render('phpBBStatusSiteBundle:Overides:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Overides entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Overides();
        $form = $this->createForm(new OveridesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_overides_show', array('id' => $entity->getId())));
        }

        return $this->render('phpBBStatusSiteBundle:Overides:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Overides entity.
     *
     */
    public function newAction()
    {
        $entity = new Overides();
        $form   = $this->createForm(new OveridesType(), $entity);

        return $this->render('phpBBStatusSiteBundle:Overides:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Overides entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('phpBBStatusSiteBundle:Overides')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Overides entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('phpBBStatusSiteBundle:Overides:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Overides entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('phpBBStatusSiteBundle:Overides')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Overides entity.');
        }

        $editForm = $this->createForm(new OveridesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('phpBBStatusSiteBundle:Overides:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Overides entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('phpBBStatusSiteBundle:Overides')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Overides entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new OveridesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_overides_edit', array('id' => $id)));
        }

        return $this->render('phpBBStatusSiteBundle:Overides:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Overides entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('phpBBStatusSiteBundle:Overides')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Overides entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_overides'));
    }

    /**
     * Creates a form to delete a Overides entity by id.
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
