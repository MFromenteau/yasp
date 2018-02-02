<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

    /**
     * @Route("/payment")
     */
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

    /*
     * @param Array transac
     *
     * @description this function prepare the transaction and
     * ask the user for confirmation
     */
	public static function validatePaiement($order,$render,$session){

        return $render->render("all/paiement/confirmation_summary.html.twig",["session"=>$session,"order"=>$order]);
	}

    /**
     * @Route("/paiement/respond", name="creation")
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
	 * @Route("/paiement/user/{id}/remboursement", name="remboursementGet")
	 * @Method({"GET"})
	 */
	public function refundGet(){
			//www.yasp.fr/paiement/user/67890/remboursement
	}
}

