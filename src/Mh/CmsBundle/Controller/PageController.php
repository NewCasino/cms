<?php

namespace Mh\CmsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Mh\CmsBundle\Entity\Page;
use Mh\CmsBundle\Form\PageType;

/**
 * Page controller.
 *
 */
class PageController extends Controller
{
    public function publishAction($pageId)
    {
        $handler = $this->get("mh.page.handler");
        $handler->publishPage();

        return $this->redirect(
            $this->generateUrl(
                "pages_stage",
                array("pageId" => $handler->getPage()->getId())
            )
        );
    }

    public function unPublishAction($pageId)
    {
        $handler = $this->get("mh.page.handler");
        $handler->unPublishPage();

        return $this->redirect(
            $this->generateUrl(
                "pages_stage",
                array("pageId" => $handler->getPage()->getId())
            )
        );
    }

    /**
     * Lists all Page entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MhCmsBundle:Page')->findAll();

        // We need to provide a new form for the modal to use.
        $entity = new Page();
        $form   = $this->createForm(
            new PageType($this->get("mh.page.handler")), $entity
        );

        return $this->render('MhCmsBundle:Page:index.html.twig', array(
            'entities' => $entities,
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Page entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MhCmsBundle:Page')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Page entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MhCmsBundle:Page:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    private function createPageFromRequest(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $data = $this->getRequest()->request->all();
        $name = $data["page"]["page_name"];
        $maxChildren = $data["page"]["page_max_children"];
        $parent = $data["page"]["page_parent"];

        if ($parent) {
            $parent = $em->getRepository("MhCmsBundle:Page")->find($parent);
        } else {
            $parent = null;
        }

        try {
            $handler = $this->get("mh.page.handler");
            return $handler->createPage($name, $maxChildren, $parent);
        } catch (Mh\CmsBundle\Classes\Page\PageCreationFailedExeption $e) {
            $this->get("session")->getFlashBag()->add("error", $e->getMessage());
        }
    }

    /**
     * Provides a means to display a page in a staging environment.
     *
     * @param integer $pageId
     */
    public function stageAction($pageId)
    {
        $vars = array(
            "stage" => $this->get("mh.page.stager"),
            "mode" => "build"
        );

        return $this->render("MhCmsBundle:Page:stage.html.twig", $vars);
    }

    /**
     * Displays a form to create a new Page entity.
     *
     */
    public function newAction()
    {
        $entity = new Page();
        $form   = $this->createForm(
            new PageType($this->get("mh.page.handler")), $entity
        );

        return $this->render('MhCmsBundle:Page:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Page entity.
     *
     */
    public function createAction(Request $request)
    {
        $page = $this->createPageFromRequest($this->getRequest());

        return $this->redirect(
            $this->generateUrl('pages_show', array('id' => $page->getId()))
        );
    }

    /**
     * Displays a form to edit an existing Page entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MhCmsBundle:Page')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Page entity.');
        }

        $editForm = $this->createForm(
            new PageType($this->get("mh.page.handler")), $entity
        );
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MhCmsBundle:Page:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Page entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MhCmsBundle:Page')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Page entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PageType($this->get("mh.page.handler")), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pages_edit', array('id' => $id)));
        }

        return $this->render('MhCmsBundle:Page:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Page entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MhCmsBundle:Page')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Page entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pages'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }

    public function removeSubBlockAction()
    {
        $builder = $this->get("mh.page.builder");
        //$range = range(9, 15);

        //foreach ($range as $int) {
            $builder->removeSubBlock(17);
        //}
        die("work this through");
    }


    public function addBlockAction($pageId)
    {
        $data = $this->getRequest()->request->get("content_block");

        try {
            $builder = $this->get("mh.page.builder");
            $block = $builder->addSubBlock($data);
        } catch (PageNotFoundException $e) {
            die("add a proper error here.");
        }

        if ($this->getRequest()->isXmlHttpRequest()) {
            $path = $block->getContentBlockType()->getContentBlockTemplate()->getTemplateIncludePath();
            return $this->render($path, array("content" => $block));
        }

        return $this->redirect($this->generateUrl(
            "pages_stage", array("pageId" => $pageId)
        ));
    }
}
