<?php

namespace Mh\CmsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Mh\CmsBundle\Entity\Website;
use Mh\CmsBundle\Form\WebsiteType;

/**
 * Website controller.
 *
 */
class WebsiteController extends Controller
{
	public function unallocatedAction()
	{
		return new Response("No allocated websites.");
	}
	
    /**
     * Lists all Website entities.
     *
     */
    public function indexAction()
    {
    	$allocation = $this->container->get("website_allocation_handler");
    	   	
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MhCmsBundle:Website')->findAll();

        return $this->render('MhCmsBundle:Website:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Website entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MhCmsBundle:Website')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Website entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MhCmsBundle:Website:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Website entity.
     *
     */
    public function newAction()
    {
        $entity = new Website();
        $form   = $this->createForm(new WebsiteType(), $entity);

        return $this->render('MhCmsBundle:Website:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Website entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Website();
        $form = $this->createForm(new WebsiteType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('websites_show', array('id' => $entity->getId())));
        }

        return $this->render('MhCmsBundle:Website:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Website entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MhCmsBundle:Website')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Website entity.');
        }

        $editForm = $this->createForm(new WebsiteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MhCmsBundle:Website:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Website entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MhCmsBundle:Website')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Website entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new WebsiteType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('websites_edit', array('id' => $id)));
        }

        return $this->render('MhCmsBundle:Website:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Website entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MhCmsBundle:Website')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Website entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('websites'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
