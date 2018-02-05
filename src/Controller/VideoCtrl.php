<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Video;
use App\Entity\Commentaire;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

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
        $session = new Session();
        $session->start();

        $video = $this->getDoctrine()
            ->getRepository(Video::class)
            ->find($id);

        if (!$video) {
            return $this->render('all/404.html.twig');
        }

        $commentaries = $this->getDoctrine()
            ->getRepository(Commentaire::class)
            ->findBy([
               'idvideo' => $id
            ]);
        $usr = $session->get('usr');
        return $this->render('all/video.html.twig',array("usr"=>$session->get("usr"),'video' => $video,'commentaries' => $commentaries));

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
     * @Route("/video/{id}/comment/new", name="newComment")
     * @Method({"POST"})
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
	public function createCommentByIdVideo($id, Request $request){
        $session = new Session();
        $session->start();
	    $postedComment = $request->request->get('comment');
        $usr = $session->get('usr');

        if(!$usr){
            return $this->render('all/404.html.twig'); // We need a better error handler here
        }

        $em = $this->getDoctrine()->getManager();


        $comment = new Commentaire();
        $comment->setIdutilisateur($usr->getIdutilisateur());
        $comment->setIdvideo($id);
        $comment->setMessage($postedComment);
        $comment->setCreatedat(new \DateTime());

        $em->persist($comment);
        $em->flush();

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        // need to serialize the two entities to array them and get json of that array, so that we can return this big pack to the js
        $usrJson = $serializer->serialize($usr, 'json');
        $commentJson = $serializer->serialize($comment, 'json');

        $jsonFinal = ['comment'=>$commentJson,'usr'=>$usrJson];

	    return new JsonResponse($serializer->serialize($jsonFinal, 'json'));
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
        $session = new Session();
        $session->start();

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();

        $qb->select('v')
            ->addSelect('c')
            ->addSelect('u')
            ->addSelect('i')
            ->join('e.comments', 'c')
            ->join('c.user', 'u')
            ->join('u.infos', 'i')
            ->from('App\Entity\User', 'u')
            ->from('App\Entity\Video', 'v')
            ->from('App\Entity\Paiement', 'p')
            ->where("u.idutilisateur = p.idrecipient")
            ->andWhere("p.idvideo = v.idvideo")
            ->andWhere("u.idutilisateur = ".$session->get("usr")->getIdutilisateur());

        return $session;
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

