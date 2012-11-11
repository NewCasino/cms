<?php

namespace Mh\CmsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Mh\CmsBundle\Entity\ContentBlock;
use Mh\CmsBundle\Form\ContentBlockType;

/**
 * ContentBlock controller.
 *
 */
class ContentBlockController extends Controller
{
    /**
     * Lists all ContentBlock entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MhCmsBundle:ContentBlock')->findAll();

        return $this->render('MhCmsBundle:ContentBlock:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a ContentBlock entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MhCmsBundle:ContentBlock')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContentBlock entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MhCmsBundle:ContentBlock:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new ContentBlock entity.
     *
     */
    public function newAction()
    {
        $entity = new ContentBlock();
        $form   = $this->createForm(new ContentBlockType(), $entity);

        return $this->render('MhCmsBundle:ContentBlock:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new ContentBlock entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new ContentBlock();
        $form = $this->createForm(new ContentBlockType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('content-blocks_show', array('id' => $entity->getId())));
        }

        return $this->render('MhCmsBundle:ContentBlock:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ContentBlock entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MhCmsBundle:ContentBlock')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContentBlock entity.');
        }

        $editForm = $this->createForm(new ContentBlockType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MhCmsBundle:ContentBlock:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing ContentBlock entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MhCmsBundle:ContentBlock')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContentBlock entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ContentBlockType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('content-blocks_edit', array('id' => $id)));
        }

        return $this->render('MhCmsBundle:ContentBlock:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ContentBlock entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MhCmsBundle:ContentBlock')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ContentBlock entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('content-blocks'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
