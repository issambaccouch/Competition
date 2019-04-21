<?php

namespace CompetitionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CompetitionBundle\Entity\dmoffre;
use Symfony\Component\HttpFoundation\Request;

class DmofferController extends Controller
{
    public function adddemandeofferAction($id)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser()->getId();
        $dmoffere = new dmoffre();
        $em = $this->getDoctrine()->getManager();
        $dmoffere->setIduser( $user );
        $dmoffere->setIdoffer($id);
        $em->persist($dmoffere);
        $em->flush();
        return $this->render('@Competition/Dmoffer/adddemandeoffer.html.twig', array(
        ));
    }

    public function deletedemmandeofferAction()
    {
        return $this->render('@Competition/Dmoffer/deletedemmandeoffer.html.twig', array(

        ));
    }

}
