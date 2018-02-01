<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PaiementCtrl extends Controller
{
    /**
     * @Route("/paiement/create", name="effectuer")
     * @Method({"POST"})
     * @param Request $request
     */
	public function effectuerPaiement($id, Request $request){
	    /*
	     * This function need several MANDATORY PARAMETER in it's request :
	     * @param successUrlCallback url to be redirected to when the payment is made, MUST BE POST
	     * @param errorUrlCallback url to be redirected to when the payment is made, MUST BE POST
	     * @param securityToken token to put in the post request to confirm the payment
	     * @param
	     */
		$desc = $request->request->get('');

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

