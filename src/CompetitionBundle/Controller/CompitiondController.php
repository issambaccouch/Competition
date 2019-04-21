<?php

namespace CompetitionBundle\Controller;

use CompetitionBundle\Entity\Competitions;
use CompetitionBundle\Entity\Compitiondemande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CompitiondController extends Controller
{

    public function addcompititionAction($id)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser()->getId();
        $usercv=$this->get('security.token_storage')->getToken()->getUser()->getNotecv();
        $username=$this->get('security.token_storage')->getToken()->getUser()->getUsername();
        $compitiondemande = new Compitiondemande();
        $em = $this->getDoctrine()->getManager();
        $emm = $this->getDoctrine()->getManager();
        $compitition=$emm->getRepository(Competitions::class)->find($id) ;
        $nbPart = $compitition->getNbrPart();
        $compitition->decNbrPart($nbPart);
        $competitiontitre= $compitition->getTitle();
        $emm->persist($compitition);
        $em->flush();
        $compitiondemande->setIduser( $user );
        $compitiondemande->setIdcompt($id);
        $compitiondemande->setUsercv($usercv);
        $compitiondemande->setUsername($username);
        $compitiondemande->setCompetitiontitre($competitiontitre);
        $em->persist($compitiondemande);
        $em->flush();
        return $this->redirectToRoute('competition_index');
    }


}
