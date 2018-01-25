<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Session\Session;

use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Query\Expr;

/**
 * @Route("/user")
 */
class UserCtrl extends Controller
{
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
            return new Response('User not found');
        }

        if ($usr->getPsw() != $password){
            return new Response('Wrong password');
        }
        $usr->setPsw("nope");
        $session->set("usr",$usr);

        return  $this->redirect($this->generateUrl('homepage'));
	}
    /**
     * @Route("/profile")
     * @Method({"GET"})
     */
    public function profile(){
        $session = new Session();
        $session->start();

        if(!$session->get("usr")){
            return new Response('You must login.');
        }

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();;

        //$query = $em->createNativeQuery('Select * from Video v, Paiement p where v.idVideo = p.idVideo and p.idRecipient = userId', $rsm);
        $qb->select('p')
            ->from('App\Entity\User', 'u')
            ->from('App\Entity\Paiement', 'p')
            ->where("u.idutilisateur = p.idrecipient")
            ->andWhere("u.idutilisateur = ".$session->get("usr")->getIdutilisateur());


        $usr = $session->get('usr');
        return $this->render('all/user/profile.html.twig', ["usr"=>$usr]);
    }
    /**
     * @Route("/library")
     * @Method({"GET"})
     */
    public function library(){
        $session = new Session();
        $session->start();

        if(!$session->get("usr")){
            return new Response('You must login.');
        }

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
        return $this->render('all/user/library.html.twig', ["usr"=>$usr,'videos' => $userVideo, "count"=>count($userVideo)]);
    }
    /**
     * @Route("/orders")
     * @Method({"GET"})
     */
    public function orders(){
        $session = new Session();
        $session->start();

        if(!$session->get("usr")){
            return new Response('You must login.');
        }

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();;

        //$query = $em->createNativeQuery('Select * from Video v, Paiement p where v.idVideo = p.idVideo and p.idRecipient = userId', $rsm);
        $qb->select('p')
            ->from('App\Entity\User', 'u')
            ->from('App\Entity\Paiement', 'p')
            ->where("u.idutilisateur = p.idrecipient")
            ->andWhere("u.idutilisateur = ".$session->get("usr")->getIdutilisateur());

        $achat=  $qb->getQuery()->getResult();
        $usr = $session->get('usr');
        return $this->render('all/user/Orders.html.twig', ["usr"=>$usr,'videos' => $achat, "count"=>count($achat)]);
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
}

