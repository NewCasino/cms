<?php

namespace Mh\CmsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Mh\CmsBundle\Entity\ContentBlockTemplate;
use Mh\CmsBundle\Form\ContentBlockTemplateType;

/**
 * ContentBlockTemplate controller.
 *
 */
class ContentBlockTemplateController extends Controller
{
    /**
     * Lists all ContentBlockTemplate entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MhCmsBundle:ContentBlockTemplate')->findAll();

        return $this->render('MhCmsBundle:ContentBlockTemplate:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a ContentBlockTemplate entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MhCmsBundle:ContentBlockTemplate')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContentBlockTemplate entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MhCmsBundle:ContentBlockTemplate:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new ContentBlockTemplate entity.
     *
     */
    public function newAction()
    {
        $entity = new ContentBlockTemplate();
        $form   = $this->createForm(new ContentBlockTemplateType(), $entity);

        return $this->render('MhCmsBundle:ContentBlockTemplate:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new ContentBlockTemplate entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new ContentBlockTemplate();
        $form = $this->createForm(new ContentBlockTemplateType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('content-block-templates_show', array('id' => $entity->getId())));
        }

        return $this->render('MhCmsBundle:ContentBlockTemplate:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ContentBlockTemplate entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MhCmsBundle:ContentBlockTemplate')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContentBlockTemplate entity.');
        }

        $editForm = $this->createForm(new ContentBlockTemplateType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MhCmsBundle:ContentBlockTemplate:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing ContentBlockTemplate entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MhCmsBundle:ContentBlockTemplate')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContentBlockTemplate entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ContentBlockTemplateType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('content-block-templates_edit', array('id' => $id)));
        }

        return $this->render('MhCmsBundle:ContentBlockTemplate:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ContentBlockTemplate entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MhCmsBundle:ContentBlockTemplate')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ContentBlockTemplate entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('content-block-templates'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
