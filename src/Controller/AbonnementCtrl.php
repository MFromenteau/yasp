<?php

namespace App\Controller;

use App\Entity\Abonnementhistorique;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Query\Expr;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Abonnement;
use App\Entity\User;

use DateTime;
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

        return $this->render("all/abonnement/all_subscription.html.twig",array("usr"=>$session->get("usr"),"subscription"=>$abo));
    }

    /**
     * @param Abonnement abo
     * @return bool state of abonnement true = valid, false = out-of-date
     */
    public static function isAboValid($abo){
        if(!$abo)
            return false;

            $endDate = DateTime::createFromFormat('d-m-Y H:i',$abo->getCreatedat()->format('d-m-Y H:i'))->add(date_interval_create_from_date_string($abo->getIdabonnement()->getDuree().' days'));
        return ((new DateTime())  <= $endDate);
    }

    public static function getLastPurchasedAbonnement($session,$em){
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

        return $qb->getQuery()->getResult();
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

        $res = AbonnementCtrl::getLastPurchasedAbonnement($session,$em);
        if($res && ($lastAbo = $res[0]) && AbonnementCtrl::isAboValid($lastAbo)){
                // User is already subscribed
                return $this->render("all/message.html.twig",["usr"=>$session->get("usr"),"message"=>"You already are linked to a subscription plan, please unsubscribe in you profile page if you want to change subscription."]);
        }

        //get the abonnement to sub entity
        $aboToSub = $em->getRepository(Abonnement::class)->find($idAbo);
        //setting future subscription
        $session->set('aboToSub',$aboToSub->getIdabonnement());

        return PaiementCtrl::validatePaiement(
            "Subscription to the ".$aboToSub->getNom()." plan",
            $aboToSub->getPrix(),
            $this->generateUrl("confirmAbo"),
            $this->generateUrl("cancelAbo"),
            $this,
            $session);
    }

    /**
     * @Route("/confirmAbo", name="confirmAbo")
     * @Method({"GET"})
     */
    public function confirmAbo(){
        $session = new Session();
        $session->start();
        $em = $this->getDoctrine()->getManager();

        if(UserCtrl::isLoggedIn($session,$this) != "OK"){return UserCtrl::isLoggedIn($session,$this);}

        if( $session->get('abonnementToSub') == null)
            $this->render("all/message.html.twig",["usr"=>$session->get('usr'),"message"=>"You don't have a subscription validated"]);


        $usr = $em->getRepository(User::class)
            ->findOneBy([
                'idutilisateur' => $session->get('usr')->getIdutilisateur()
            ]);

        $ah = new Abonnementhistorique();
        $ah->setCreatedat(new DateTime("now"));
        $ah->setIdabonnement($em->getRepository(Abonnement::class)->find($session->get('aboToSub')));
        $ah->setIdutilisateur($usr);
        $ah->setIdOrders($session->get('trans'));

        //merge is important so it doesn't try tro recreate(persist) user and abonnement in cascade
        $em->merge($ah);
        $em->flush();

        return $this->render("all/message.html.twig",["usr"=>$session->get('usr'),"message"=>"You successfully subscribed"]);
    }

    /**
     * @Route("/cancelAbo", name="cancelAbo")
     * @Method({"GET"})
     */
    public function cancelAbo(){
        $session = new Session();
        $session->start();

        if(UserCtrl::isLoggedIn($session,$this) != "OK"){return UserCtrl::isLoggedIn($session,$this);}

        $session->set('abonnementToSub',null);

        return $this->render("all/message.html.twig",["usr"=>$session->get('usr'),"message"=>"You canceled your subscription"]);
    }

    /**
     * @Route("/unsubscribe", name="annulation_abo")
     * @Method({"GET"})
     */
    public function annuleSub(){
        $session = new Session();
        $session->start();

        if(UserCtrl::isLoggedIn($session,$this) != "OK"){return UserCtrl::isLoggedIn($session,$this);}

        $em = $this->getDoctrine()->getManager();
        $res = AbonnementCtrl::getLastPurchasedAbonnement($session,$em);

        if(!$res || ($lastAbo = $res[0]) && !AbonnementCtrl::isAboValid($lastAbo)){
            // User is not subscribed
            return $this->render("all/message.html.twig",["usr"=>$session->get("usr"),"message"=>"You don't have a subscription to cancel"]);
        }

        $em->remove($lastAbo);
        $em->flush();

        return $this->render("all/message.html.twig",["usr"=>$session->get('usr'),"message"=>"You successfully unsubscribed"]);
    }
}

