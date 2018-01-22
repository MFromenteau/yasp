<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AbonnementCtrl extends Controller
{
    /**
     * @Route("/abonnement/user/{id}", name="abonnement")
     * @Method({"GET"})
     * @param $id
     */
	public function getAbo($id){

			//www.yasp.fr/abbonnement/user/67890
	}

    /**
     * @Route("/abonnement/user/{id}/historique", name="historique_abo")
     * @Method({"GET"})
     * @param $id
     */
	public function getHistoAbo($id){

			//www.yasp.fr/abbonnement/user/67890/historique
	}

    /**
     * @Route("/abonnement/user/{id}/renouvellement", name="renouvellement_abo")
     * @Method({"POST"})
     * @param $id
     */

	public function renouvelle($id){
		

			//www.yasp.fr/abbonnement/user/67890/renouvellement
	}

    /**
     * @Route("/abonnement/user/{id}/souscription", name="souscription")
     * @Method({"POST"})
     * @param $id
     * @param Request $request
     */
	public function souscrit($id, Request $request){
		$codeAbo = $request->request->get('codeAbo');

			//www.yasp.fr/abbonnement/user/67890/souscription
	}

    /**
     * @Route("/abonnement/user/{id}/annulation", name="annulation_abo")
     * @Method({"POST"})
     * @param $id
     */
	public function annule($id){

			//www.yasp.fr/abbonnement/user/67890/annulation
	}
}

