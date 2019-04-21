<?php

namespace AdminBundle\Controller;

use CompetitionBundle\Entity\Competitions;
use CompetitionBundle\Entity\Compitiondemande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Admin/Default/index.html.twig');
    }
    /**
     * Lists all competition entities.
     *
     */
    public function listcompetAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $competitions = $em->getRepository('CompetitionBundle:Competitions')->findAll();
        $emm = $this->getDoctrine()->getManager();
        $compitiondemande = $emm->getRepository("CompetitionBundle:Compitiondemande")->findAll();

        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */
        $paginator= $this->get('knp_paginator');
        $result = $paginator->paginate(
            $competitions,
            $request->query->getInt('page', 1), 3);
        return $this->render('@Admin/competitions/index.html.twig', array(
            'competitions' => $result,
            'compitiondemande' => $compitiondemande,
        ));
    }

    /**
     * Creates a new competition entity.
     *
     */
    public function newcompetAction(Request $request)
    {
        $competition = new Competitions();
        $form = $this->createForm('CompetitionBundle\Form\CompetitionsType', $competition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($competition);
            $em->flush();

            return $this->redirectToRoute('competition_show', array('idCmpt' => $competition->getIdcmpt()));
        }

        return $this->render('@Admin/competitions/new.html.twig', array(
            'competition' => $competition,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a competition entity.
     * @param Competitions $competition
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showcompetAction(Competitions $competition)
    {
        $deleteForm = $this->createDeletecompetForm($competition);

        return $this->render('@Admin/competitions/show.html.twig', array(
            'competition' => $this->incrementeView($competition),
            'competition' => $competition,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing competition entity.
     *
     */
    public function editcompetAction(Request $request, Competitions $competition)
    {
        $deleteForm = $this->createDeletecompetForm($competition);
        $editForm = $this->createForm('CompetitionBundle\Form\CompetitionsType', $competition);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('competition_edit', array('idCmpt' => $competition->getIdcmpt()));
        }

        return $this->render('@Admin/competitions/edit.html.twig', array(
            'competition' => $competition,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a competition entity.
     *
     */
    public function deletecompetAction(Request $request, Competitions $competition)
    {
        $form = $this->createDeletecompetForm($competition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($competition);
            $em->flush();
        }

        return $this->redirectToRoute('admin_competition_index');
    }

    /**
     * Creates a form to delete a competition entity.
     *
     * @param Competitions $competition The competition entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeletecompetForm(Competitions $competition)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_competition_delete', array('idCmpt' => $competition->getIdcmpt())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

    /**
     * @param Competitions $competitions
     * @return Competitions
     */
    private function incrementeView(Competitions $competitions)
    {
        $competitions->addView();
        $em = $this->getDoctrine()->getManager();;
        $em->persist($competitions);
        $em->flush();

        return $competitions;
    }

    /**
     * Lists all compitiondemande entities.
     *
     */
    public function indexdemAction()
    {
        $em = $this->getDoctrine()->getManager();

        $compitiondemandes = $em->getRepository('CompetitionBundle:Compitiondemande')->findAll();

        return $this->render('@Admin/compitiondemande/index.html.twig', array(
            'compitiondemandes' => $compitiondemandes,
        ));
    }

    /**
     * Creates a new compitiondemande entity.
     *
     */
    public function newdemAction(Request $request)
    {
        $compitiondemande = new Compitiondemande();
        $form = $this->createForm('CompetitionBundle\Form\CompitiondemandeType', $compitiondemande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($compitiondemande);
            $em->flush();

            return $this->redirectToRoute('admin_compitiondemande_show', array('id' => $compitiondemande->getId()));
        }

        return $this->render('@Admin/compitiondemande/new.html.twig', array(
            'compitiondemande' => $compitiondemande,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a compitiondemande entity.
     * @param Compitiondemande $compitiondemande
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showdemAction(Compitiondemande $compitiondemande)
    {

        return $this->render('@Admin/compitiondemande/show.html.twig', array(
            'compitiondemande' => $compitiondemande,
        ));
    }

    /**
     * Displays a form to edit an existing compitiondemande entity.
     *
     */
    public function editdemAction(Request $request, Compitiondemande $compitiondemande)
    {
        $editForm = $this->createForm('CompetitionBundle\Form\CompitiondemandeType', $compitiondemande);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_compitiondemande_edit', array('id' => $compitiondemande->getId()));
        }

        return $this->render('@Admin/compitiondemande/edit.html.twig', array(
            'compitiondemande' => $compitiondemande,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a compitiondemande entity.
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deletedemAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('CompetitionBundle:Compitiondemande')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Preisliste entity.');
        }
        $em->remove($entity);
        $em->flush();
        return $this->redirect($this->generateUrl('admin_compitiondemande_index'));
    }

    public function admindecisionAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('CompetitionBundle:Compitiondemande')->find($id);
        $entity->setAdmindecision(true);
        $em->flush();
        return $this->redirect($this->generateUrl('admin_compitiondemande_index'));
    }
}
