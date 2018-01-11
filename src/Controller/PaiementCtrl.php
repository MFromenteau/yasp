<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PaiementCtrl extends Controller
{
	/**
	 * @Route("/paiement/emis/{id}", name="emis")
	 * @Method({"GET"})
	 */
	public function getPaiementEmis($id){

			//www.yasp.fr/paiement/emis/67890
	}
	/**
	 * @Route("/paiement/effectuer/{id}", name="effectuer")
	 * @Method({"POST"})
	 */
	public function effectuerPaiement($id){
		$somme = mysqli_real_escape_string($request->request->get('somme'));
		$desc = mysqli_real_escape_string($request->request->get('desc'));

			//www.yasp.fr/paiement/effectuer/67890
	}
		/**
	 * @Route("/paiement/effectuer/{id}", name="effectuerGet")
	 * @Method({"GET"})
	 */
	public function effectuerPaiementGet(){
			//www.yasp.fr/paiement/effectuer/67890
	}
	/**
	 * @Route("/paiement/creer/{id}", name="creation")
	 * @Method({"POST"})
	 */
	public function createPaiement($id){
		$somme = mysqli_real_escape_string($request->request->get('somme'));
		$desc = mysqli_real_escape_string($request->request->get('desc'));

			//www.yasp.fr/paiement/creer/67890
	}
		/**
	 * @Route("/paiement/creer/{id}", name="creationGET")
	 * @Method({"GET"})
	 */
	public function createPaiementGET($id){
			//www.yasp.fr/paiement/creer/67890
	}
		/**
	 * @Route("/paiement/remboursement/{id}", name="remboursement")
	 * @Method({"POST"})
	 */
	public function refund($id){
		$paiement = mysqli_real_escape_string($request->request->get('paiement'));

			//www.yasp.fr/paiement/remboursement/67890
	}
			/**
	 * @Route("/paiement/remboursement/{id}", name="remboursementGet")
	 * @Method({"GET"})
	 */
	public function refundGet(){
			//www.yasp.fr/paiement/remboursement/67890
	}
}

