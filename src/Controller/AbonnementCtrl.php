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
     * @Route("/", name="AllSubscription")
     * @return \Symfony\Component\HttpFoundation\Response
     *
     *
     */
    public function AllSubscription(){
        //This is the page allowing to select the desired subsciption
        $session = new Session();
        $session->start();

        if(UserCtrl::isLoggedIn($session,$this) != "OK"){return UserCtrl::isLoggedIn($session,$this);}

        $em = $this->getDoctrine()->getManager();
        $abo = $em->getRepository(Abonnement::class)
            ->findAll();


        return $this->render("all/abonnement/all_subscription.html.twig",array("session"=>$session,"subscription"=>$abo));
    }

    /**
     * @Route("/subscribe/{idAbo}", name="souscription")
     * @Method({"POST"})
     */
    public function souscrit($idAbo,Request $request){
        $codeAbo = $request->request->get('codeAbo');

        //www.yasp.fr/abbonnement/user/67890/souscription
    }

    /**
     * @Route("/unsubscribe", name="annulation_abo")
     * @Method({"POST"})
     */
	public function annule($id){

			//www.yasp.fr/abbonnement/user/67890/annulation
	}
}

