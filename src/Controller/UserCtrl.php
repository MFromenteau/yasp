<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
    private $passwordPattern = '/^[a-zA-Z0-9-. _\/]{8,20}$/';
    private $mailPattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,}$/';
    private $namePattern = '/^[a-zA-Z]{2,}$/';

    public static function isLoggedIn($session,$ctrl){

        if(!$session || !$session->get("usr")){
            return $ctrl->render('all/message.html.twig', ["usr"=>null,"message"=>"You must login to access this page"]);
        }
        return "OK";
    }

	/**
	 * @Route("/register", name="enregistrement")
	 * @Method({"POST"})
	 */
	public function register(Request $request){
        $session = new Session();
        $session->start();
        //file_put_contents( 'debug' . date('_M_D_H,m,s',time()  ).'.log', var_export( $request, true));
       // $logger->info(var_dump($request->request));

        $email = $request->request->get('email');
		$confemail = $request->request->get('confemail');
		$firstname = $request->request->get('firstname');
		$lastname = $request->request->get('lastname');
		$password = $request->request->get('password');
		$confpassword = $request->request->get('confpassword');



		$em = $this->getDoctrine()->getManager();

		if(!preg_match($this->mailPattern, $email)){
            return $this->render('all/message.html.twig',["usr"=>$session->get("usr"),'message'=>'Invalid E-mail.']);
        }

		if($email != $confemail){
            return $this->render('all/message.html.twig',["usr"=>$session->get("usr"),'message'=>'E-mail is not identical.']);
		}

		if(!preg_match($this->passwordPattern, $password)){
            return $this->render('all/message.html.twig',["usr"=>$session->get("usr"),'message'=>'Invalid Password']);
        }
		
		if($password != $confpassword){
            return $this->render('all/message.html.twig',["usr"=>$session->get("usr"),'message'=>'The password is not identical']);
		}

		if(!preg_match($this->namePattern, $firstname)){
            return $this->render('all/message.html.twig',["usr"=>$session->get("usr"),'message'=>'Invalid firstname']);
        }

        if(!preg_match($this->namePattern, $lastname)){
            return $this->render('all/message.html.twig',["usr"=>$session->get("usr"),'message'=>'Invalid lastname']);
        }

        $usr = new User();
        $usr->setEmail($email);
        $usr->setPrenom($firstname);
        $usr->setNom($lastname);
        $usr->setUrlAvatar('https://steamuserimages-a.akamaihd.net/ugc/868480752636433334/1D2881C5C9B3AD28A1D8852903A8F9E1FF45C2C8/');
        $usr->setPsw(crypt ($password,$_ENV["SALT"]));
        $usr->setAccountDelete(0);


        if( $em->getRepository(User::class)
            ->findBy([
                'prenom' => $firstname,
                'nom' => $lastname
            ])
        ){
            return $this->render('all/message.html.twig',["usr"=>$session->get("usr"),'message'=>'User déjà présent avec ce nom prénom.']);
            return $this->render('all/message.html.twig',['message'=>'User already exists whit this name']);
        }

        if( $em->getRepository(User::class)
            ->findBy([
                'email' => $email
            ])
        ){
            return $this->render('all/message.html.twig',["usr"=>$session->get("usr"),'message'=>'User déjà présent avec cet email.']);
            return $this->render('all/message.html.twig',['message'=>'User already exists whit this email']);
        }

        $em->persist($usr);
        $em->flush();

        $usr->setPsw("nope");
        $usr->abo = null;
        $session->set("usr",$usr);


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
		$passwordSubject = $request->request->get('password');


		if ( !preg_match($this->passwordPattern, $passwordSubject)){
            return $this->render('all/message.html.twig',["usr"=>$session->get("usr"),'message'=>'Wrong password']);
        }

        if (!preg_match($this->mailPattern, $email)){
            return $this->render('all/message.html.twig',["usr"=>$session->get("usr"),'message'=>'User not found']);
        }

        $em = $this->getDoctrine()->getManager();
        $usr = $em->getRepository(User::class)
            ->findOneBy([
                'email' => $email,
                'accountDelete' => 0
            ]);

        if(!$usr){
            return $this->render('all/message.html.twig',["usr"=>$session->get("usr"),'message'=>'User not found']);
        }

        if ($usr->getPsw() != $password){
            return $this->render('all/message.html.twig',["usr"=>$session->get("usr"),'message'=>'Wrong password']);
        }
        $usr->setPsw("nope");
        $session->set("usr",$usr);
        $abo = AbonnementCtrl::getLastPurchasedAbonnement($session,$this->getDoctrine()->getManager());
        $usr->abo = $abo;
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
     * @Route("/profile", name="profile")
     * @Method({"GET"})
     */
    public function profile(){
        $session = new Session();
        $session->start();

        if(UserCtrl::isLoggedIn($session,$this) != "OK"){return UserCtrl::isLoggedIn($session,$this);}

        return $this->render('all/user/profile.html.twig', ["usr"=>$session->get("usr")]);
    }

    /**
     * @Route("/profile/edit")
     * @Method({"POST"})
     */
    public function profileEdit(Request $request){
        $session = new Session();
        $session->start();

        if(UserCtrl::isLoggedIn($session,$this) != "OK"){return UserCtrl::isLoggedIn($session,$this);}

        $email = $request->request->get('email');
        $firstname = $request->request->get('firstname');
        $lastname = $request->request->get('lastname');
        $password = $request->request->get('password');
        $urlAvatar = $request->request->get('urlAvatar');


        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)
                ->find($session->get("usr")->getIdutilisateur());


        if(!$user){
            throw $this->createNotFoundException(
                'No User found for id '.$session->get("usr")->getIdutilisateur()
            );

        }

        $user->setEmail($email);
        $user->setPrenom($firstname);
        $user->setNom($lastname);
        $user->setUrlavatar($urlAvatar);

                if($password != ""){
            $user->setPsw(crypt ($password,$_ENV["SALT"]));
        }

        $em->flush();

        // Refresh usr session variable, to get all the changed value
        $session->remove("usr");
        $user->setPsw("nope");
        $session->set("usr",$user);


        return  $this->redirect($this->generateUrl('profile'));
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
        $userVideo = VideoCtrl::getAllVideoByUser($session->get('usr')->getIdutilisateur(),$em);

        return $this->render('all/user/library.html.twig', ["usr"=>$session->get("usr"),'videos' => $userVideo, "count"=>count($userVideo)]);
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
            ->from('App\Entity\Orders', 'p')
            ->where("p.idrecipient = ".$session->get("usr")->getIdutilisateur())
            ->orderBy('p.createdat', 'DESC');

        $achat=  $qb->getQuery()->getResult();
        return $this->render('all/user/Orders.html.twig', ["usr"=>$session->get("usr"),'orders' => $achat, "count"=>count($achat)]);
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

        //gat all purcahsed abonnement
        $qb->select('ah', 'ajah')
            ->from('App\Entity\Abonnement', 'a')
            ->from('App\Entity\Abonnementhistorique', 'ah')
            ->join("ah.idabonnement","ajah")
            ->where("ah.idutilisateur = ".$session->get("usr")->getIdutilisateur())
            ->orderBy('ah.createdat', 'DESC');

        $abo=  $qb->getQuery()->getResult();
        $currAbo = null;
        $trial = false;

        //get trials
        $qb = $em->createQueryBuilder();
        $qb->select('a')
            ->from('App\Entity\Abonnement', 'a')
            ->where('a.nom LIKE \'%trial%\'')
            ->andWhere('a.nom LIKE \'%Trial%\'');
        $trials=  $qb->getQuery()->getResult();

        //find current Abonnement and if it is trial
        foreach ($abo as $val){
           if( AbonnementCtrl::isAboValid($val)){
                $currAbo = $val;
                if(in_array($currAbo->getIdabonnement(),$trials )){
                    $trial = true;
                }
           }
        }

        //delete the current abonnement from history
        if($currAbo)
            unset($abo[array_search($currAbo,$abo)]);

        return $this->render('all/user/subscription.html.twig',
            ["usr"=>$session->get("usr"),
                'abohisto' => $abo,
                'currAbo'=>$currAbo,
                'trial'=>$trial]);
    }
    /**
     * @Route("/accountDelete" , name="accountDelete")
     * @Method({"GET"})
     */
    public function accountDelete(){
        $session = new Session();
        $session->start();

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)
            ->find($session->get("usr")->getIdutilisateur());

        if(!$user){
            throw $this->createNotFoundException(
                'No User found for id '.$session->get("usr")->getIdutilisateur()
            );
        }

        $user->setAccountDelete(1);

        $em->flush();

        $session->invalidate();
        return  $this->redirect($this->generateUrl('homepage'));
    }
}

