<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserCtrl extends Controller
{
	/**
	 * @Route("user/register", name="test")
	 * 
	 */
	 public function test(){
    	$data = array(array('titre' => 'video 1', "description" => "bla bla bla video 1"), array('titre' => 'video 2', "description" => "bla bla bla video 2"), array('titre' => 'video 2', "description" => "bla bla bla video 2"), array('titre' => 'video 2', "description" => "bla bla bla video 2"), array('titre' => 'video 2', "description" => "bla bla bla video 2"));
        return $this->render('all/index.html.twig', ['videos' => $data]);
	 }
	 
	/**
	 * @Route("user/register", name="enregistrement")
	 * @Method({"POST"})
	 */
	public function register(){
    	return new Response('hit');
		$email = mysqli_real_escape_string($request->request->get('email'));
		$confemail = mysqli_real_escape_string($request->request->get('confemail'));
		$firstname = mysqli_real_escape_string($request->request->get('firstname'));
		$lastname = mysqli_real_escape_string($request->request->get('lastname'));
		$password = mysqli_real_escape_string($request->request->get('password'));
		$confpassword = mysqli_real_escape_string($request->request->get('confpassword'));

		$em = $this->getDoctrine()->getManager();
		
		if($email != $confemail){
    		return new Response('E-mail non identique.');
		}
		
		if($password != $confpassword){
    		return new Response('Mot de passe non-identique');
		}
		
		if( $this->getDoctrine()
	        ->getRepository(User::class)
	        ->findBy([
	        	'prenom' => $firstname,
				'nom' => $lastname 
				])
		){
			// response already exist
		}
		
		$usr = new User();
	}
	
	/**
	 * @Route("/user/login", name="login")
	 * @Method({"GET"})
	 */
	public function login(){

			//www.yasp.fr/user/login
	}
	
	/**
	 * @Route("/user/login", name="loginPost")
	 * @Method({"POST"})
	 */
	public function loginPost(){
		$email = mysqli_real_escape_string($request->request->get('email'));
		$password = mysqli_real_escape_string($request->request->get('password'));
			//www.yasp.fr/user/login
	}
	/**
	 * @Route("/user/{id}/connecte", name="connecte")
	 * @Method({"POST"})
	 */
	public function isLoggedIn($id){
		$id = mysqli_real_escape_string($request->request->get('iduser'));

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
	 * @Route("/user/{id}/profil", name="profil")
	 * @Method({"GET"})
	 */
	 
	// public function getUser($id){

	// 		//www.yasp.fr/user/67890/profil
	// }
}

