<?php

namespace CompetitionBundle\Controller;

use CompetitionBundle\Entity\dmoffre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Dmoffre controller.
 *
 */
class dmoffreController extends Controller
{
    /**
     * Lists all dmoffre entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dmoffres = $em->getRepository('CompetitionBundle:dmoffre')->findAll();

        return $this->render('dmoffre/index.html.twig', array(
            'dmoffres' => $dmoffres,
        ));
    }

    /**
     * Creates a new dmoffre entity.
     *
     */
    public function newAction(Request $request)
    {
        $dmoffre = new Dmoffre();
        $form = $this->createForm('CompetitionBundle\Form\dmoffreType', $dmoffre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dmoffre);
            $em->flush();

            return $this->redirectToRoute('dmoffre_show', array('id' => $dmoffre->getId()));
        }

        return $this->render('dmoffre/new.html.twig', array(
            'dmoffre' => $dmoffre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a dmoffre entity.
     *
     */
    public function showAction(dmoffre $dmoffre)
    {
        $deleteForm = $this->createDeleteForm($dmoffre);

        return $this->render('dmoffre/show.html.twig', array(
            'dmoffre' => $dmoffre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing dmoffre entity.
     *
     */
    public function editAction(Request $request, dmoffre $dmoffre)
    {
        $deleteForm = $this->createDeleteForm($dmoffre);
        $editForm = $this->createForm('CompetitionBundle\Form\dmoffreType', $dmoffre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dmoffre_edit', array('id' => $dmoffre->getId()));
        }

        return $this->render('dmoffre/edit.html.twig', array(
            'dmoffre' => $dmoffre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a dmoffre entity.
     *
     */
    public function deleteAction(Request $request, dmoffre $dmoffre)
    {
        $form = $this->createDeleteForm($dmoffre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dmoffre);
            $em->flush();
        }

        return $this->redirectToRoute('dmoffre_index');
    }

    /**
     * Creates a form to delete a dmoffre entity.
     *
     * @param dmoffre $dmoffre The dmoffre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(dmoffre $dmoffre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dmoffre_delete', array('id' => $dmoffre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
