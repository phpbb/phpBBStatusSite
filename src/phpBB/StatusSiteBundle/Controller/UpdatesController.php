<?php

namespace phpBB\StatusSiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use phpBB\StatusSiteBundle\Entity\Updates;
use phpBB\StatusSiteBundle\Form\UpdatesType;

/**
 * Updates controller.
 *
 */
class UpdatesController extends Controller
{

    /**
     * Lists all Updates entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('phpBBStatusSiteBundle:Updates')->findAll();

        return $this->render('phpBBStatusSiteBundle:Updates:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Updates entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Updates();
        $form = $this->createForm(new UpdatesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_updates_show', array('id' => $entity->getId())));
        }

        return $this->render('phpBBStatusSiteBundle:Updates:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Updates entity.
     *
     */
    public function newAction()
    {
        $entity = new Updates();
        $form   = $this->createForm(new UpdatesType(), $entity);

        return $this->render('phpBBStatusSiteBundle:Updates:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Updates entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('phpBBStatusSiteBundle:Updates')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Updates entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('phpBBStatusSiteBundle:Updates:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Updates entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('phpBBStatusSiteBundle:Updates')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Updates entity.');
        }

        $editForm = $this->createForm(new UpdatesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('phpBBStatusSiteBundle:Updates:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Updates entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('phpBBStatusSiteBundle:Updates')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Updates entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new UpdatesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_updates_edit', array('id' => $id)));
        }

        return $this->render('phpBBStatusSiteBundle:Updates:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Updates entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('phpBBStatusSiteBundle:Updates')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Updates entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_updates'));
    }

    /**
     * Creates a form to delete a Updates entity by id.
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
