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
     * @Route("/subscribe", name="subpage")
     * @Method({"GET"})
     */
    public function selectionPage(){
        //This is the page allowing to select the desired subsciption
        $session = new Session();
        $session->start();

        if(UserCtrl::isLoggedIn($session,$this) != "OK"){return UserCtrl::IsLoggedIn($session,$this);}

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
        $qb->select('a')
            ->from("App\Entity\Abonnement",'a');
        $a = $qb->getQuery()->getResult();

        return $this->render("all/abonnement/abonnement.html.twig",['abos'=>$a,'session'=>$session]);
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

