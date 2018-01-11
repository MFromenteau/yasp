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
	 * @Route("/video/theme", name="theme")
	 * @Method({"GET"})
	 */
	public function getVideoByTheme(){

			//www.yasp.fr/video/connecte/
	}
	/**
	 * @Route("/{id}/video", name="recherche")
	 * @Method({"GET"})
	 */
	public function getVideoById($id){

			//www.yasp.fr/67890/video
	}
	/**
	 * @Route("/video/upload/", name="upload")
	 * @Method({"POST"})
	 */
	public function upload(){
		$session = new Session();
		$session->start();
		$idUser = $session->get("user").id;
		$prix = mysqli_real_escape_string($request->request->get('prix'));
		$titre = mysqli_real_escape_string($request->request->get('titre'));
		$url = mysqli_real_escape_string($request->request->get('url'));

			//www.yasp.fr/video/upload
	}
	/**
	 * @Route("/video/upload/", name="uploadGET")
	 * @Method({"GET"})
	 */
	public function uploadGet(){
			//www.yasp.fr/video/upload
	}
	/**
	 * @Route("/video/{id}/liste", name="liste")
	 * @Method({"GET"})
	 */
	public function getAllVideoByIdUser($id){

			//www.yasp.fr/video/67890/liste
	}
	/**
	 * @Route("/video/{id_Video}/nouveau", name="nouveau")
	 * @Method({"POST"})
	 */
	public function createComment($id_Video){
		$idUser = mysqli_real_escape_string($request->request->get('idUser'));
		$text = mysqli_real_escape_string($request->request->get('text'));

			//www.yasp.fr/video/67890/nouveau
	}
	/**
	 * @Route("/video/{id_Video}/nouveau", name="nouveau")
	 * @Method({"GET"})
	 */
	public function createCommentGet(){
			//www.yasp.fr/video/67890/nouveau
	}
	
	/**
	 * @Route("/video/{id_Video}/supression", name="supression")
	 * @Method({"POST"})
	 */
	public function deleteComment($id_Video){
		$idComment = mysqli_real_escape_string($request->request->get('idComment'));

			//www.yasp.fr/video/67890/supression
	}
	/**
	 * @Route("/video/{id_Video}/supression", name="supression")
	 * @Method({"GET"})
	 */
	public function deleteCommentGet($id_Video){
			//www.yasp.fr/video/67890/supression
	}
	/**
	 * @Route("/video/{id_Video}/edit", name="edit")
	 * @Method({"POST"})
	 */
	public function modifyComment($id_Video){
		$idComment = mysqli_real_escape_string($request->request->get('idComment'));
		$newComment = mysqli_real_escape_string($request->request->get('newComment'));

			//www.yasp.fr/video/67890/edit
	}
	/**
	 * @Route("/video/{id}/com_by_user", name="commentaire_by_user")
	 * @Method({"GET"})
	 */
	public function GetCommentByUser($id){

			//www.yasp.fr/video/67890/com_by_user
	}
	/**
	 * @Route("/video/{$id_Video}/com_by_video", name="commentaire_by_video")
	 * @Method({"GET"})
	 */
	public function GetCommentByVid($id_Video){

			//www.yasp.fr/video/com_by_video/67890
	}
	/**
	 * @Route("/video/com_by_id/{id}", name="commentaire_by_id")
	 * @Method({"GET"})
	 */
	public function GetCommentById($id){

			//www.yasp.fr/video/com_by_id/67890
	}
	/**
	 * @Route("/video/{$id_Video}/achat", name="achat")
	 * @Method({"POST"})
	 */
	public function acheter($id_Video){
		$idUser = mysqli_real_escape_string($request->request->get('idUser'));

			//www.yasp.fr/video/acheter/67890
	}
	/**
	 * @Route("/video/{$id_Video}/achat", name="achat")
	 * @Method({"GET"})
	 */
	public function acheterGet(){
			//www.yasp.fr/video/acheter/67890
	}
}

