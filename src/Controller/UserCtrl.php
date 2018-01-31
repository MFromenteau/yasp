<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Session\Session;
use DateTime;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Query\Expr;

/**
 * @Route("/user")
 */
class UserCtrl extends Controller
{

    public static function isLoggedIn($session,$ctrl){

        if(!$session->get("usr")){
            return $ctrl->render('all/message.html.twig', ["message"=>"You must login to access this page"]);
        }

        return "OK";
    }

	/**
	 * @Route("/register", name="enregistrement")
	 * @Method({"POST"})
	 */
	public function register(Request $request){
        //file_put_contents( 'debug' . date('_M_D_H,m,s',time()  ).'.log', var_export( $request, true));
       // $logger->info(var_dump($request->request));

        $email = $request->request->get('email');
		$confemail = $request->request->get('confemail');
		$firstname = $request->request->get('firstname');
		$lastname = $request->request->get('lastname');
		$password = $request->request->get('password');
		$confpassword = $request->request->get('confpassword');

		$em = $this->getDoctrine()->getManager();

		if($email != $confemail){
    		return new Response('E-mail non identique.');
		}
		
		if($password != $confpassword){
    		return new Response('Mot de passe non-identique');
		}

        $usr = new User();
        $usr->setEmail($email);
        $usr->setPrenom($firstname);
        $usr->setNom($lastname);
        $usr->setPsw(crypt ($password,$_ENV["SALT"]));

        if( $em->getRepository(User::class)
            ->findBy([
                'prenom' => $firstname,
                'nom' => $lastname
            ])
        ){
            return new Response('User déjà présent avec ce nom prénom.');
        }

        if( $em->getRepository(User::class)
            ->findBy([
                'email' => $email
            ])
        ){
            return new Response('User déjà présent avec cet email.');
        }

        $em->persist($usr);
        $em->flush();

        //file_put_contents( 'logs/debugobj' . date('_M_D_H,m,s',time()  ).'.log', var_export( $usr, true));

//        return new Response('User créé, id :'.$usr->getIdUtilisateur())
        return  $this->redirect($this->generateUrl('homepage'));
	}
	
	/**
	 * @Route("/login", name="login")
	 * @Method({"POST"})
	 */
	public function login(Request $request){
        $session = new Session();
        $session->start();
		$email = $request->request->get('email');
		$password = crypt($request->request->get('password'),$_ENV["SALT"]);

        $em = $this->getDoctrine()->getManager();
        $usr = $em->getRepository(User::class)
            ->findOneBy([
                'email' => $email
            ]);

        if(!$usr){
            return $this->render('all/message.html.twig',['message'=>'User not found']);
        }

        if ($usr->getPsw() != $password){
            return $this->render('all/message.html.twig',['message'=>'Wrong password']);
        }
        $usr->setPsw("nope");
        $session->set("usr",$usr);

        return  $this->redirect($this->generateUrl('homepage'));
	}

    /**
     * @Route("/logout", name="deconnexion")
     * @Method({"GET"})
     */
    public function logout(){
        $session = new Session();
        $session->start();
        $session->invalidate();

        return  $this->redirect($this->generateUrl('homepage'));
    }

    /**
     * @Route("/profile")
     * @Method({"GET"})
     */
    public function profile(){
        $session = new Session();
        $session->start();

        if(UserCtrl::isLoggedIn($session,$this) != "OK"){return UserCtrl::isLoggedIn($session,$this);}

        return $this->render('all/user/profile.html.twig', ["session"=>$session]);
    }

    /**
     * @Route("/library")
     * @Method({"GET"})
     */
    public function library(){
        $session = new Session();
        $session->start();

        if(UserCtrl::isLoggedIn($session,$this) != "OK"){return UserCtrl::isLoggedIn($session,$this);}

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();;

        //$query = $em->createNativeQuery('Select * from Video v, Paiement p where v.idVideo = p.idVideo and p.idRecipient = userId', $rsm);
        $qb->select('v')
            ->from('App\Entity\User', 'u')
            ->from('App\Entity\Video', 'v')
            ->from('App\Entity\Paiement', 'p')
            ->where("u.idutilisateur = p.idrecipient")
            ->andWhere("p.idvideo = v.idvideo")
            ->andWhere("u.idutilisateur = ".$session->get("usr")->getIdutilisateur());

        $userVideo=  $qb->getQuery()->getResult();
        $usr = $session->get('usr');
        return $this->render('all/user/library.html.twig', ["session"=>$session,'videos' => $userVideo, "count"=>count($userVideo)]);
    }

    /**
     * @Route("/orders")
     * @Method({"GET"})
     */
    public function orders(){
        $session = new Session();
        $session->start();

        if(UserCtrl::isLoggedIn($session,$this) != "OK"){return UserCtrl::isLoggedIn($session,$this);}

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();

        //$query = $em->createNativeQuery('Select * from Video v, Paiement p where v.idVideo = p.idVideo and p.idRecipient = userId', $rsm);
        $qb->select('p')
            ->from('App\Entity\User', 'u')
            ->from('App\Entity\Paiement', 'p')
            ->where("u.idutilisateur = p.idrecipient")
            ->andWhere("u.idutilisateur = ".$session->get("usr")->getIdutilisateur());



        $achat=  $qb->getQuery()->getResult();
        $usr = $session->get('usr');
        return $this->render('all/user/Orders.html.twig', ["session"=>$session,'orders' => $achat, "count"=>count($achat)]);
    }

    /**
     * @Route("/subscription")
     * @Method({"GET"})
     */
    public function subscription() {
        $session = new Session();
        $session->start();

        if(UserCtrl::isLoggedIn($session,$this) != "OK"){return UserCtrl::isLoggedIn($session,$this);}

        //Preparing the tool to build a dql->sql query
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();

        $qb->select('ah', 'ajah')
            ->from('App\Entity\Abonnement', 'a')
            ->from('App\Entity\Abonnementhistorique', 'ah')
            ->join("ah.idabonnement","ajah")
            ->where("ah.idutilisateur = ".$session->get("usr")->getIdutilisateur());

        $abo=  $qb->getQuery()->getResult();
        $currAbo = null;
        $trial = false;

        $qb = $em->createQueryBuilder();
        $qb->select('a')
            ->from('App\Entity\Abonnement', 'a')
            ->where('a.nom LIKE \'%trial%\'')
            ->andWhere('a.nom LIKE \'%Trial%\'');
        $trials=  $qb->getQuery()->getResult();

        foreach ($abo as $val){
           $endDate = date_create($val->getCreatedat()->format('d-m-Y'))->add(date_interval_create_from_date_string($val->getIdabonnement()->getDuree().' days'));
           if( date_create()  <= $endDate){
                $currAbo = $val;
                //Hard coded
                if(in_array($currAbo->getIdabonnement(),$trials )){
                    $trial = true;
                }
           }
        }

        unset($abo[array_search($currAbo,$abo)]);

        return $this->render('all/user/subscription.html.twig',
            ["session"=>$session,
                'abohisto' => $abo,
                'currAbo'=>$currAbo,
                'trial'=>$trial]);
    }
}

