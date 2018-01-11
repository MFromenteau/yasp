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
	 */
	public function getAbo($id){

			//www.yasp.fr/abbonnement/user/67890
	}
	/**
	 * @Route("/abonnement/historique{id}", name="historique_abo")
	 * @Method({"GET"})
	 */
	public function getHistoAbo($id){

			//www.yasp.fr/abbonnement/historique/67890
	}
	/**
	 * @Route("/abonnement/renouvellement{id}", name="renouvellement_abo")
	 * @Method({"POST"})
	 */

	public function renouvelle($id){
		

			//www.yasp.fr/abbonnement/renouvellement
	}
		/**
	 * @Route("/abonnement/souscription/{id}", name="souscription")
	 * @Method({"POST"})
	 */
	public function souscrit($id){
		$codeAbo = mysqli_real_escape_string($request->request->get('codeAbo'));

			//www.yasp.fr/abbonnement/souscription/67890
	}
		/**
	 * @Route("/abonnement/annulation{id}", name="annulation_abo")
	 * @Method({"POST"})
	 */
	public function annule($id){

			//www.yasp.fr/abbonnement/annulation/67890
	}
}

