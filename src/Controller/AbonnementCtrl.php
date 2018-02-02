<?php

namespace App\Controller;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Query\Expr;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Abonnement;
/**
 * @Route("/subscription")
 */
class AbonnementCtrl extends Controller
{
    /**
     * @Route("/subscribe", name="AllSubscription")
     */
    public function allSubscription(){
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
     * @param Abonnement abo
     * @return bool state of abonnement true = valid, false = out-of-date
     */
    public static function isAboValid($abo){
        if(!$abo)
            return false;

            $endDate = date_create($abo->getCreatedat()->format('d-m-Y'))->add(date_interval_create_from_date_string($abo->getIdabonnement()->getDuree().' days'));
        return (date_create()  <= $endDate);
    }

    /**
     * @Route("/subscribe/{idAbo}", name="souscription")
     * @Method({"GET"})
     */
    public function souscrit($idAbo){
        //This is the page allowing to select the desired subsciption
        $session = new Session();
        $session->start();

        if(UserCtrl::isLoggedIn($session,$this) != "OK"){return UserCtrl::isLoggedIn($session,$this);}

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();

        //gat last purcahsed abonnement
        $qb->select("ah, ajah")
            ->from('App\Entity\Abonnement', 'a')
            ->from('App\Entity\Abonnementhistorique', 'ah')
            ->join("ah.idabonnement","ajah")
            ->where("ah.idutilisateur = ".$session->get("usr")->getIdutilisateur())
            ->andWhere("ah.createdat = (".$em->createQueryBuilder()
                    ->select("Max(mah.createdat) as mcreatedat")
                    ->from('App\Entity\Abonnementhistorique', 'mah')
                    ->where("mah.idutilisateur = ".$session->get("usr")->getIdutilisateur())->getDql().")"
            );

        file_put_contents("query.txt",var_export($qb->getDql(),true));
        $lastAbo = $qb->getQuery()->getResult()[0];

        if(AbonnementCtrl::isAboValid($lastAbo)){
            return $this->render("all/message.html.twig",["session"=>$session,"message"=>"You already are linked to a subscription plan, please unsubscribe in you profile page if you want to change subscription."]);
        }

        return PaiementCtrl::validatePaiement(["abo"=>1,"price"=>0.89],$this,$session);
    }

    /**
     * @Route("/unsubscribe", name="annulation_abo")
     * @Method({"POST"})
     */
	public function annule($id){

			//www.yasp.fr/abbonnement/user/67890/annulation
	}
}

