<?php

namespace CompetitionBundle\Controller;

use CompetitionBundle\Entity\Competitions;
use CompetitionBundle\Entity\Compitiondemande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Compitiondemande controller.
 *
 */
class CompitiondemandeController extends Controller
{
    /**
     * Lists all compitiondemande entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $compitiondemandes = $em->getRepository('CompetitionBundle:Compitiondemande')->findAll();

        return $this->render('compitiondemande/index.html.twig', array(
            'compitiondemandes' => $compitiondemandes,
        ));
    }

    /**
     * Creates a new compitiondemande entity.
     *
     */
    public function newAction(Request $request)
    {
        $compitiondemande = new Compitiondemande();
        $form = $this->createForm('CompetitionBundle\Form\CompitiondemandeType', $compitiondemande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($compitiondemande);
            $em->flush();

            return $this->redirectToRoute('compitiondemande_show', array('id' => $compitiondemande->getId()));
        }

        return $this->render('compitiondemande/new.html.twig', array(
            'compitiondemande' => $compitiondemande,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a compitiondemande entity.
     *
     */
    public function showAction(Compitiondemande $compitiondemande)
    {
        $deleteForm = $this->createDeleteForm($compitiondemande);

        return $this->render('compitiondemande/show.html.twig', array(
            'compitiondemande' => $compitiondemande,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing compitiondemande entity.
     *
     */
    public function editAction(Request $request, Compitiondemande $compitiondemande)
    {
        $deleteForm = $this->createDeleteForm($compitiondemande);
        $editForm = $this->createForm('CompetitionBundle\Form\CompitiondemandeType', $compitiondemande);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('compitiondemande_edit', array('id' => $compitiondemande->getId()));
        }

        return $this->render('compitiondemande/edit.html.twig', array(
            'compitiondemande' => $compitiondemande,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a compitiondemande entity.
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('CompetitionBundle:Compitiondemande')->find($id);
        $idcompet =$entity->getIdcompt();
        $emm = $this->getDoctrine()->getManager();
        $entityy = $emm->getRepository(Competitions::class)->find($idcompet);
        $nbPart = $entityy->getNbrPart();
        $entityy->incNbrPart($nbPart);
        $emm->persist($entityy);

        $emm->flush();
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Preisliste entity.');
        }
        $em->remove($entity);
        $em->flush();
        return $this->redirect($this->generateUrl('competition_index'));
    }

}
