<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Query\Expr;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use Psr\Log\LoggerInterface;

class UserCtrl extends Controller
{
	/**
	 * @Route("user/register", name="enregistrement")
	 * @Method({"POST"})
	 */
	public function register(LoggerInterface $logger,Request $request){
        $request = Request::createFromGlobals();
        $logger->info("!! request : ");
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
        $usr->setPsw($password);

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
	 * @Route("/user/login", name="loginPost")
	 * @Method({"POST"})
	 */
	public function loginPost(){
        $request = Request::createFromGlobals();
		$email = $request->request->get('email');
		$password = $request->request->get('password');
			//www.yasp.fr/user/login
	}
	/**
	 * @Route("/user/{id}/isLoggedIn", name="isLoggedIn")
	 * @Method({"POST"})
	 */
	public function isLoggedIn($id){
        $request = Request::createFromGlobals();
		$id = $request->request->get('iduser');

			//www.yasp.fr/user/67890/connecte
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

