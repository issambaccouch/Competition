<?php

namespace CompetitionBundle\Controller;

use CompetitionBundle\Entity\Cvs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * Cv controller.
 *
 */
class CvsController extends Controller
{
    /**
     * Lists all cv entities.
     *
     */
    public function indexAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $cvs = $em->getRepository('CompetitionBundle:Cvs')->findAll();

        return $this->render('cvs/index.html.twig', array(
            'cvs' => $cvs,
            'user'=>$user
        ));
    }

    /**
     * Creates a new cv entity.
     * @param Request $request
     * @param UserInterface $user
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser()->getId();
        $cv = new Cvs();
        $form = $this->createForm('CompetitionBundle\Form\CvsType', $cv);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $cv->setUser( $user );
            $em->persist($cv);
            $em->flush();

            return $this->redirectToRoute('Cvs_show', array('idCv' => $cv->getIdcv()));
        }



        return $this->render('cvs/new.html.twig', array(
            'cv' => $cv,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cv entity.
     *
     */
    public function showAction(Cvs $cv)
    {
        $deleteForm = $this->createDeleteForm($cv);

        return $this->render('cvs/show.html.twig', array(
            'cv' => $cv,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cv entity.
     *
     */
    public function editAction(Request $request, Cvs $cv)
    {
        $deleteForm = $this->createDeleteForm($cv);
        $editForm = $this->createForm('CompetitionBundle\Form\CvsType', $cv);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Cvs_edit', array('idCv' => $cv->getIdcv()));
        }

        return $this->render('cvs/edit.html.twig', array(
            'cv' => $cv,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cv entity.
     *
     */
    public function deleteAction(Request $request, Cvs $cv)
    {
        $form = $this->createDeleteForm($cv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cv);
            $em->flush();
        }

        return $this->redirectToRoute('Cvs_index');
    }

    /**
     * Creates a form to delete a cv entity.
     *
     * @param Cvs $cv The cv entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cvs $cv)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Cvs_delete', array('idCv' => $cv->getIdcv())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
