<?php

namespace App\Controller;

use App\Entity\Paiement;
use App\ORDER_STATUS;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Orders;
use DateTime;

    /**
     * @Route("/payment")
     */
class PaiementCtrl extends Controller
{

    /*
     * @param Array transac
     *
     * @description this function prepare the transaction and
     * ask the user for confirmation
     */
    public static function validatePaiement($order,$confirmUrl,$cancelUrl,$render,$session){

        //prepare the paiement in the session

        //Save the details of order in session
        $order->setStatus(ORDER_STATUS::TO_PAY);
        $session->set("order",$order);

        $session->set('confirmUrl',$confirmUrl);
        $session->set('cancelUrl' ,$cancelUrl);

        //the success and validity of paiement is assured by the checksum
        //at end of paypal work, it redirect to confirm page wich will check the paypal validity and
        // concordance of check sum, only if the two value are correct the paiement will be valid
        $order->generateMd5($session->get('usr')->getIdutilisateur());
        //TODO Secure payement, verify subscription
        return $render->render("all/paiement/confirmation_summary.html.twig",["usr"=>$session->get("usr"),"checksum" => $order->getMd5(),"orderDescList"=>$order->getDescList(),"totalPrice"=>$order->getTotalPrice()]);
    }

    /**
     * @Route("/confirmOrder", name="confirmOrder")
     * @Method({"GET"})
     */
    public function confirmPayment(){
        $session = new Session();
        $session->start();

        //verifiacation of order and usr
        if(UserCtrl::isLoggedIn($session,$this) != "OK"){return UserCtrl::isLoggedIn($session,$this);}
        if(!$session->get('order'))
            return $this->render('all/message.html.twig',["usr"=>$session->get('usr'),"message"=>"You don't have an order to confirm"]);

        //getting the order to confirm
        $order =  $session->get("order");
        if($order->getStatus() != ORDER_STATUS::TO_PAY){
            return $this->render('all/message.html.twig',["usr"=>$session->get('usr'),"message"=>"You didn't pay your order."]);
        }

        $order->setStatus(ORDER_STATUS::CONFIRMED);

        //creating the payement
        $p = new Orders();
        $p->setDescription($order->getDescConcat());
        $p->setCreatedat(new DateTime("now"));
        $p->setIdrecipient($session->get('usr')->getIdutilisateur());
        $p->setTotalPrice($order->getTotalPrice());

        $em = $this->getDoctrine()->getManager();
        $em->persist($p);
        $em->flush();

        $session->set("trans",$p);
        $session->set('order',$order);
        return $this->redirect($session->get('confirmUrl'));
    }

    /**
     * @Route("/cancelOrder", name="cancelOrder")
     * @Method({"GET","POST"})
     */
    public function cancelPayment(){
        $session = new Session();
        $session->start();

        if(UserCtrl::isLoggedIn($session,$this) != "OK"){return UserCtrl::isLoggedIn($session,$this);}

        $session->set('order',null);

        return $this->redirect($session->get('cancelUrl'));
    }
}

