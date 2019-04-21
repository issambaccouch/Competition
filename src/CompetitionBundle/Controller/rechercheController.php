<?php

namespace CompetitionBundle\Controller;

use CompetitionBundle\Entity\Compitiondemande;
use CompetitionBundle\Repository\CompitiondemandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class rechercheController extends Controller
{
    public function rechercheAction(Request $request )
    {
        $cats=$this->getDoctrine()->getRepository(Compitiondemande::class )->FindByNom("nada");

        return $this->render('@Competition/recherche/recherche.html.twig', array(
            'cats'=>$cats
        ));
    }

    /**
     * @param Request $request
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function rechercheajaxAction(Request $request)
    {
        $partd=$this->getDoctrine()->getRepository('CompetitionBundle:Compitiondemande')->FindAll();
        if ($request->isXmlHttpRequest())
        {
            $nom=$request->get('nom');
            dump($nom);
            $partd=$this->getDoctrine()->getRepository('CompetitionBundle:Compitiondemande')->FindByNom($nom);
            $se=new Serializer(array(new ObjectNormalizer()));
            $data=$se->normalize($partd);
            return new  JsonResponse($data);
        }
        return $this->render('@Competition/recherche/rechercheajax.html.twig', array(
            'partd'=>$partd
        ));
    }

}
