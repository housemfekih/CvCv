<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * Template controller.
 *
 * @Route("template")
 */
class TemplateController extends Controller
{
    /**
     * Lists all template entities.
     *
     * @Route("/", name="template_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $templates = $em->getRepository('AppBundle:Template')->findAll();

        return $this->render('template/index.html.twig', array(
            'templates' => $templates,
        ));
    }

    /**
     * Creates a new template entity.
     *
     * @Route("/new", name="template_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $template = new Template();
        $form = $this->createForm('AppBundle\Form\TemplateType', $template);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
			
			
			$file = $template->getFichierTemplate();

            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

            // moves the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('template_directory'),
                $fileName
            );

            // updates the 'brochure' property to store the PDF file name
            // instead of its contents
            $template->setFichierTemplate($fileName);
			
			$homepage = file_get_contents($this->getParameter('template_directory').'/'.$fileName);
			$imageName = $this->generateUniqueFileName().'.jpg';
			$this->get('knp_snappy.image')->generate('http://localhost/resume_builder/web/app_dev.php/template/test/index', $this->getParameter('template_directory').'/'.'/'. $imageName );
			$template->setContent($imageName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($template);
            $em->flush();

            return $this->redirectToRoute('template_show', array('id' => $template->getId()));
        }

        return $this->render('template/new.html.twig', array(
            'template' => $template,
            'form' => $form->createView(),
        ));
    }
	
	/**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }     
     
    /**
     * Finds and displays a template entity.
     *
     * @Route("/{id}", name="template_show")
     * @Method("GET")
     */
    public function showAction(Template $template)
    {
        $deleteForm = $this->createDeleteForm($template);

        return $this->render('template/show.html.twig', array(
            'template' => $template,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing template entity.
     *
     * @Route("/{id}/edit", name="template_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Template $template)
    {
        $deleteForm = $this->createDeleteForm($template);
        $editForm = $this->createForm('AppBundle\Form\TemplateEditType', $template);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('template_edit', array('id' => $template->getId()));
        }

        return $this->render('template/edit.html.twig', array(
            'template' => $template,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a template entity.
     *
     * @Route("/{id}", name="template_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Template $template)
    {
        $form = $this->createDeleteForm($template);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($template);
            $em->flush();
        }

        return $this->redirectToRoute('template_index');
    }

    /**
     * Creates a form to delete a template entity.
     *
     * @param Template $template The template entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Template $template)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('template_delete', array('id' => $template->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
	
	/**
     * Lists all template entities.
     *
     * @Route("/test/{p}", name="template_test")
     */
    public function testAction($p)
    {

        return $this->render('templates/'.$p.'.html.twig', array(
     
        ));
    }
}
