<?php

namespace CompetitionBundle\Controller;

use CompetitionBundle\Entity\Competitions;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Competition controller.
 *
 */
class CompetitionsController extends Controller
{
    /**
     * Lists all competition entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $competitions = $em->getRepository('CompetitionBundle:Competitions')->findAll();

        $user = $this->get('security.token_storage')->getToken()->getUser()->getId();

        $emm = $this->getDoctrine()->getManager();
        $compitiondemande = $emm->getRepository("CompetitionBundle:Compitiondemande")->findAll();

        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */
        $paginator= $this->get('knp_paginator');
        $result = $paginator->paginate(
            $competitions,
            $request->query->getInt('page', 1), 3);
        return $this->render('competitions/index.html.twig', array(
            'competitions' => $result,
            'compitiondemande' => $compitiondemande,
            'user'=>$user
        ));
    }

    /**
     * Creates a new competition entity.
     *
     */
    public function newAction(Request $request)
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

        return $this->render('competitions/new.html.twig', array(
            'competition' => $competition,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a competition entity.
     * @param Competitions $competition
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Competitions $competition)
    {
        $deleteForm = $this->createDeleteForm($competition);

        return $this->render('competitions/show.html.twig', array(
            'competition' => $this->incrementeView($competition),
            'competition' => $competition,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing competition entity.
     *
     */
    public function editAction(Request $request, Competitions $competition)
    {
        $deleteForm = $this->createDeleteForm($competition);
        $editForm = $this->createForm('CompetitionBundle\Form\CompetitionsType', $competition);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('competition_index');

        }

        return $this->render('competitions/edit.html.twig', array(
            'competition' => $competition,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a competition entity.
     *
     */
    public function deleteAction(Request $request, Competitions $competition)
    {
        $form = $this->createDeleteForm($competition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($competition);
            $em->flush();
        }

        return $this->redirectToRoute('competition_index');
    }

    /**
     * Creates a form to delete a competition entity.
     *
     * @param Competitions $competition The competition entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Competitions $competition)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('competition_delete', array('idCmpt' => $competition->getIdcmpt())))
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
}
