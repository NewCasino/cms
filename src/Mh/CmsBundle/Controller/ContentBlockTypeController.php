<?php

namespace Mh\CmsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Mh\CmsBundle\Entity\ContentBlockType;
use Mh\CmsBundle\Form\ContentBlockTypeType;

/**
 * ContentBlockType controller.
 *
 */
class ContentBlockTypeController extends Controller
{
    /**
     * Lists all ContentBlockType entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MhCmsBundle:ContentBlockType')->findAll();

        return $this->render('MhCmsBundle:ContentBlockType:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a ContentBlockType entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MhCmsBundle:ContentBlockType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContentBlockType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MhCmsBundle:ContentBlockType:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new ContentBlockType entity.
     *
     */
    public function newAction()
    {
        $entity = new ContentBlockType();
        $form   = $this->createForm(new ContentBlockTypeType(), $entity);

        return $this->render('MhCmsBundle:ContentBlockType:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new ContentBlockType entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new ContentBlockType();
        $form = $this->createForm(new ContentBlockTypeType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('content-block-types_show', array('id' => $entity->getId())));
        }

        return $this->render('MhCmsBundle:ContentBlockType:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ContentBlockType entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MhCmsBundle:ContentBlockType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContentBlockType entity.');
        }

        $editForm = $this->createForm(new ContentBlockTypeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MhCmsBundle:ContentBlockType:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing ContentBlockType entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MhCmsBundle:ContentBlockType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContentBlockType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ContentBlockTypeType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('content-block-types_edit', array('id' => $id)));
        }

        return $this->render('MhCmsBundle:ContentBlockType:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ContentBlockType entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MhCmsBundle:ContentBlockType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ContentBlockType entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('content-block-types'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
