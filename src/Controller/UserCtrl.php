<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Query\Expr;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\Query\ResultSetMapping;

class UserCtrl extends Controller
{
	/**
	 * @Route("user/register", name="enregistrement")
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

//        return new Response('User créé, id :'.$usr->getIdutilisateur());
        return  $this->redirect($this->generateUrl('homepage'));
	}
	
	/**
	 * @Route("/user/login", name="login")
	 * @Method({"POST"})
	 */
	public function login(Request $request){
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
        $session = new Session();
        $session->start();
        $session->set("usr",$usr);

        return new Response('You are logged-in');
	}
	/**
	 * @Route("/user/profile/{id}")
	 * @Method({"GET"})
	 */
	public function profile($id){
	    $session = new Session();
        $session->start();

        if(!$session->get("usr")){
            return new Response('You must login.');
        }

        $em = $this->getDoctrine()->getManager();
        $rsm = new ResultSetMapping();

        //$query = $em->createNativeQuery('Select * from Video v, Paiement p where v.idVideo = p.idVideo and p.idRecipient = userId', $rsm);
        $query = $em->createNativeQuery('Select * from Video v', $rsm);
        $query->setParameter('userId',$id);
        $userVideo=  $query->getResult();
        file_put_contents("sqlTxt.txt",var_dump($userVideo));
        return $this->render('all/profile.html.twig', ['videos' => $userVideo, "count"=>count($userVideo)]);
	}
	/**
	 * @Route("/user/deconnexion", name="deconnexion")
	 * @Method({"POST"})
	 */
	public function logout(){

			//www.yasp.fr/user/deconnexion
	}
	/**
	 * @Route("/user/{id}", name="profil")
	 * @Method({"GET"})
	 */
	public function getProfil($id){
	 		//www.yasp.fr/user/67890/profil
	}
}

