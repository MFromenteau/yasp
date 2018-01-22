<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PaiementCtrl extends Controller
{
    /**
     * @Route("/paiement/user/{id}/emis", name="emis")
     * @Method({"GET"})
     * @param $id
     */
	public function getPaiementEmis($id){

			//www.yasp.fr/paiement/user/67890/emis
	}

    /**
     * @Route("/paiement/user/{id}/effectuer", name="effectuer")
     * @Method({"POST"})
     * @param $id
     * @param Request $request
     */
	public function effectuerPaiement($id, Request $request){
		$somme = $request->request->get('somme');
		$desc = $request->request->get('desc');

			//www.yasp.fr/paiement/user/67890/effectuer
	}
		/**
	 * @Route("/paiement/user/{id}/effectuer", name="effectuerGet")
	 * @Method({"GET"})
	 */
	public function effectuerPaiementGet(){
			//www.yasp.fr/paiement/user/67890/effectuer
	}

    /**
     * @Route("/paiement/user/{id}/creer", name="creation")
     * @Method({"POST"})
     * @param $id
     * @param Request $request
     */
	public function createPaiement($id, Request $request){
		$somme = $request->request->get('somme');
		$desc = $request->request->get('desc');

			//www.yasp.fr/paiement/user/67890/creer
	}

    /**
     * @Route("/paiement/user/{id}/creer", name="creationGET")
     * @Method({"GET"})
     * @param $id
     */
	public function createPaiementGET($id){
			//www.yasp.fr/paiement/user/67890/creer
	}

    /**
     * @Route("/paiement/user/{id}/remboursement", name="remboursement")
     * @Method({"POST"})
     * @param $id
     * @param Request $request
     */
	public function refund($id, Request $request){
		$paiement = $request->request->get('paiement');

			//www.yasp.fr/paiement/user/67890/remboursement
	}
			/**
	 * @Route("/paiement/user/{id}/remboursement", name="remboursementGet")
	 * @Method({"GET"})
	 */
	public function refundGet(){
			//www.yasp.fr/paiement/user/67890/remboursement
	}
}

