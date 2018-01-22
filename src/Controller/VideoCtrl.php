<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Video;

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
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response retourne la vue correspondante à la video
     * ou 404 si video absente
     */
	public function getVideoById($id){
        $video = $this->getDoctrine()
            ->getRepository(Video::class)
            ->find($id);

        if (!$video) {
            return $this->render('all/404.html.twig');
        }

        return $this->render('all/video.html.twig',array('video' => $video));

	}

    /**
     *Route to upload a new video
     *
     * @param SessionInterface $session User session
     * @param Request $request Page request
     * @Route("/video/upload/", name="uploadVideo")
     * @Method({"POST"})
     */
	public function uploadVideo(SessionInterface $session, Request $request){
		$session = new Session();
		$session->start();
		$idUser = $session->get("user")->id;
		$prix = $request->request->get('prix');
		$titre = $request->request->get('titre');
		$url = $request->request->get('url');


	}

    /**
     * @Route("/user/{id}/video/list", name="getlisteVideoByUserId")
     * @Method({"GET"})
     * @param $id
     */
	public function getAllVideoByIdUser($id){

	}

    /**
     * @Route("/video/{id}/new/comment", name="newComment")
     * @Method({"POST"})
     * @param $id
     * @param Request $request
     */
	public function createCommentByIdVideo($id, Request $request){
		$idUser = $request->request->get('idUser');
		$text = $request->request->get('text');


	}

    /**
     * @Route("/video/{id}/delete/comment", name="deleteComment")
     * @Method({"POST"})
     * @param $id
     * @param Request $request
     */
	public function deleteCommentByIdVideo($id, Request $request){
		$idComment = $request->request->get('idComment');

			//www.yasp.fr/video/67890/supression
	}

    /**
     * @Route("/video/{id}/edit/comment", name="editComment")
     * @Method({"POST"})
     * @param $id
     * @param Request $request
     */
	public function editComment($id, Request $request){
		$idComment = $request->request->get('idComment');
		$newComment = $request->request->get('newComment');

			//www.yasp.fr/video/67890/edit
	}

    /**
     * @Route("/user/{id}/comment/list", name="getAllCommentByUserId")
     * @Method({"GET"})
     * @param $id
     */
	public function getAllCommentByUserId($id){

	}

    /**
     * @Route("/video/{id}/comment/list", name="getAllCommentByVideoId")
     * @Method({"GET"})
     * @param $id
     */
	public function getAllCommentByVideoId($id){

	}

    /**
     * @Route("/comment/{id}", name="getCommentById")
     * @Method({"GET"})
     * @param $id
     */
	public function getCommentById($id){


	}

    /**
     * @Route("/video/{id}/buy", name="buyVideoById")
     * @Method({"POST"})
     * @param $id
     * @param Request $request
     */
	public function buyVideoById($id, Request $request){
		$idUser = $request->request->get('idUser');

			//www.yasp.fr/video/acheter/67890
	}
}

