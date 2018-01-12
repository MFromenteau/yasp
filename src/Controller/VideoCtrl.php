<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class VideoCtrl extends Controller
{
	//$request = Request::createFromGlobals();
	/**
	 * @Route("/video/{id}/theme", name="getThemeByVideoId")
	 * @Method({"GET"})
	 */
	public function getThemeByVideoId(){


	}
	/**
	 * @Route("/video/{id}", name="getVideoById")
	 * @Method({"GET"})
	 */
	public function getVideoById($id){


	}
	/**
	 * @Route("/video/upload/", name="uploadVideo")
	 * @Method({"POST"})
	 */
	public function uploadVideo(){
		$session = new Session();
		$session->start();
		$idUser = $session->get("user").id;
		$prix = mysqli_real_escape_string($request->request->get('prix'));
		$titre = mysqli_real_escape_string($request->request->get('titre'));
		$url = mysqli_real_escape_string($request->request->get('url'));


	}
	/**
	 * @Route("/user/{id}/video/list", name="getlisteVideoByUserId")
	 * @Method({"GET"})
	 */
	public function getAllVideoByIdUser($id){


	}
	/**
	 * @Route("/video/{id}/new/comment", name="newComment")
	 * @Method({"POST"})
	 */
	public function createCommentByIdVideo($id){
		$idUser = mysqli_real_escape_string($request->request->get('idUser'));
		$text = mysqli_real_escape_string($request->request->get('text'));


	}
	/**
	 * @Route("/video/{id}/delete/comment", name="deleteComment")
	 * @Method({"POST"})
	 */
	public function deleteCommentByIdVideo($id){
		$idComment = mysqli_real_escape_string($request->request->get('idComment'));

			//www.yasp.fr/video/67890/supression
	}
	/**
	 * @Route("/video/{id}/edit/comment", name="editComment")
	 * @Method({"POST"})
	 */
	public function editComment($id){
		$idComment = mysqli_real_escape_string($request->request->get('idComment'));
		$newComment = mysqli_real_escape_string($request->request->get('newComment'));

			//www.yasp.fr/video/67890/edit
	}
	/**
	 * @Route("/user/{id}/comment/list", name="getAllCommentByUserId")
	 * @Method({"GET"})
	 */
	public function getAllCommentByUserId($id){

	}
	/**
	 * @Route("/video/{id}/comment/list", name="getAllCommentByVideoId")
	 * @Method({"GET"})
	 */
	public function getAllCommentByVideoId($id){

	}
	/**
	 * @Route("/comment/{id}", name="getCommentById")
	 * @Method({"GET"})
	 */
	public function getCommentById($id){


	}
	/**
	 * @Route("/video/{id}/buy", name="buyVideoById")
	 * @Method({"POST"})
	 */
	public function buyVideoById($id){
		$idUser = mysqli_real_escape_string($request->request->get('idUser'));

			//www.yasp.fr/video/acheter/67890
	}
}

