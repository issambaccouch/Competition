<?php

namespace CompetitionBundle\Controller;

use CompetitionBundle\Entity\Offres;
use CompetitionBundle\Entity\dmoffre;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Offre controller.
 *
 */
class OffresController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $offres = $em->getRepository('CompetitionBundle:Offres')->findAll();
        $user = $this->get('security.token_storage')->getToken()->getUser()->getId();
        $emm = $this->getDoctrine()->getManager();
        $dmoffre = $emm->getRepository("CompetitionBundle:dmoffre")->findAll();
        return $this->render('offres/index.html.twig', array(
            'offres' => $offres,
            'dmoffre' =>$dmoffre,
            'user'=>$user
        ));
    }

    /**
     * Creates a new offre entity.
     *
     */
    public function newAction(Request $request)
    {
        $offre = new Offres();
        $form = $this->createForm('CompetitionBundle\Form\OffresType', $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($offre);
            $em->flush();

            return $this->redirectToRoute('offres_show', array('idOffre' => $offre->getIdoffre()));
        }
        return $this->render('offres/new.html.twig', array(
            'offre' => $offre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a offre entity.
     *
     */
    public function showAction(Offres $offre)
    {
        $deleteForm = $this->createDeleteForm($offre);

        return $this->render('offres/show.html.twig', array(
            'offre' => $offre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing offre entity.
     *
     */
    public function editAction(Request $request, Offres $offre)
    {
        $deleteForm = $this->createDeleteForm($offre);
        $editForm = $this->createForm('CompetitionBundle\Form\OffresType', $offre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('offres_edit', array('idOffre' => $offre->getIdoffre()));
        }

        return $this->render('offres/edit.html.twig', array(
            'offre' => $offre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a offre entity.
     *
     */
    public function deleteAction(Request $request, Offres $offre)
    {
        $form = $this->createDeleteForm($offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($offre);
            $em->flush();
        }

        return $this->redirectToRoute('offres_index');
    }

    /**
     * Creates a form to delete a offre entity.
     *
     * @param Offres $offre The offre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Offres $offre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('offres_delete', array('idOffre' => $offre->getIdoffre())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
