<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * @Route("/subscription")
 */
class AbonnementCtrl extends Controller
{
    /**
     * @Route("/", name="subpage")
     * @Method({"GET"})
     *
     *
     */
    public function chosePage(){
        //This is the page allowing to select the desired subsciption
        $session = new Session();
        $session->start();

        if(UserCtrl::isLoggedIn($session,$this)){return UserCtrl::IsLoggedIn($session,$this);}

        return $this->render("all/abonnement/chose.html.twig");
        //www.yasp.fr/abbonnement/user/67890/souscription
    }

    /**
     * @Route("/subscription/subscribe", name="souscription")
     * @Method({"GET"})
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

