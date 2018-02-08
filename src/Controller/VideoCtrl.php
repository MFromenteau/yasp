<?php

namespace App\Controller;

use Doctrine\ORM\Query\Expr;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Video;
use App\Entity\Commentaire;
use App\Order;
use App\Entity\Library;
use Symfony\Component\Finder\Expression;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;


/**
 * @Route("/video")
 */
class VideoCtrl extends Controller
{
    public static function  getAllVideoByUser($idu,$em){
        $qb = $em->createQueryBuilder();

        //$query = $em->createNativeQuery('Select * from Video v, Paiement p where v.idVideo = p.idVideo and p.idRecipient = userId', $rsm);
        $qb->select('v')
            ->from('App\Entity\User', 'u')
            ->from('App\Entity\Video', 'v')
            ->from('App\Entity\Library', 'p')
            ->where("u.idutilisateur = p.idowner")
            ->andWhere("p.idvideo = v.idvideo")
            ->andWhere("u.idutilisateur = ".$idu);

        return $qb->getQuery()->getResult();
    }

    public static function  getLibByUserVid($idv,$idu,$em){
        $qb = $em->createQueryBuilder();

        $qb->select('l')
            ->from('App\Entity\Library', 'l')
            ->where("l.idowner = ".$idu)
            ->andWhere("l.idvideo = ".$idv);

        return $qb->getQuery()->getResult();
    }

	//*****PAGES*************/
    /**
     * @Route("/{idv}", name="getVideoById")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response retourne la vue correspondante à la video
     * ou 404 si video absente
     */
	public function getVideoById($idv){
        $session = new Session();
        $session->start();
        $em = $this->getDoctrine()->getManager();
        $comment = null;

        $video = $this->getDoctrine()
            ->getRepository(Video::class)
            ->find($idv);

        if (!$video) {
            return $this->render('all/404.html.twig');
        }

        //do not ove this instruction, it is neede deven if user is subscribed
        $bought = VideoCtrl::getLibByUserVid($idv, $session->get('usr')->getIdutilisateur(), $em);

        if($video->getPrix() != 0) {
            if(UserCtrl::isLoggedIn($session,$this) != "OK"){return UserCtrl::isLoggedIn($session,$this);}

            if(!AbonnementCtrl::isAboValid(AbonnementCtrl::getLastPurchasedAbonnement($session,$em))){

                if (!$bought)
                    return $this->render('all/video/buyRequest.html.twig', ['usr' => $session->get('usr'), 'idv' => $idv]);
            }
        }

        $comments = VideoCtrl::getAllCommentByVideoId($idv,$this->getDoctrine()->getManager());
       return $this->render('all/video/display.html.twig',array(
            "usr"=>$session->get("usr"),
            'video' => $video,
            'commentaries' => $comments,
            'isBought' => $bought)
        );
	}

    /**
     * @Route("/buy/{idv}", name="buyVideoById" , requirements={"idv"="\d+"})
     * @Method({"GET"})
     */
    public function buyVideoById($idv){
        $session = new Session();
        $session->start();
        $em = $this->getDoctrine()->getManager();


        $video = $this->getDoctrine()
            ->getRepository(Video::class)
            ->find($idv);

        //verif
        if (!$video) {
            return $this->render('all/404.html.twig');
        }

        if(VideoCtrl::getLibByUserVid($idv,$session->get('usr')->getIdutilisateur(),$em))
            return  $this->render("all/message.html.twig",['usr'=>$session->get('usr'),'message'=>'You already bought the video.']);

        if($video->getPrix() == 0) {
            return  $this->render("all/message.html.twig",['usr'=>$session->get('usr'),'message'=>'This video is free, are you sure you want to buy it ? :p']);
        }


        if(UserCtrl::isLoggedIn($session,$this) != "OK"){return UserCtrl::isLoggedIn($session,$this);}

        $cmd = new Order();
        $cmd->addProduct($video->getTitre(),$video->getPrix());
        $session->set('vidToBuy',$video);

        return PaiementCtrl::validatePaiement(
            $cmd,
            $this->generateUrl("confirmBuy"),
            $this->generateUrl("cancelBuy"),
            $this,
            $session);
    }

    /**
     * @Route("/buy/confirm", name="confirmBuy")
     * @Method({"GET"})
     */
    public function confirmBuy(){
        $session = new Session();
        $session->start();
        $em = $this->getDoctrine()->getManager();

        $lib = new Library();
        $lib->setIdOrders($session->get('trans')->getIdorders());
        $lib->setIdowner($session->get('usr')->getIdutilisateur());
        $lib->setIdvideo($session->get('vidToBuy')->getIdvideo());
        $em->persist($lib);
        $em->flush();

        $vid = $session->get('vidToBuy');
        $session->set('vidToBuy',null);
        $session->set('order',null);
        $session->set('trans',null);

        return $this->render('all/message.html.twig',['usr'=>$session->get('usr'),'message'=>"You successfully bought ".$vid->getTitre()]);
    }
    /**
     * @Route("/buy/cancel", name="cancelBuy")
     * @Method({"GET"})
     */
    public function cancelBuy(){
        $session = new Session();
        $session->start();
        $session->set('vidToBuy',null);
        $session->set('order',null);
        $session->set('trans',null);

        return $this->redirect($this->generateUrl('homepage'));
    }

	//*********API*****************/
    /**
     * @Route("/{id}/comment/new", name="newComment")
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
            dump("shiet");
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

	public static function getAllCommentByVideoId($idv,$em){
        $qb = $em->createQueryBuilder();

        $qb->select('c','uc.prenom','uc.nom','uc.urlavatar')
            ->from('App\Entity\Video', 'v')
            ->from('App\Entity\Commentaire', 'c')
            ->join('c.idutilisateur','uc')
            ->where('v.idvideo = '.$idv)
            ->andWhere('c.idvideo = v.idvideo')
            ->orderBy('c.createdat','DESC');

        $res = $qb->getQuery()->getResult();
        return $res;
    }

    /**
     * @Route("/search", name="search")
     * @Method({"POST"})
     * @param Request $request
     */
    public function search(Request $request)
    {
        $session = new Session();
        $session->start();

        $search = $request->request->get('search');

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
        $qb->select('v')
            ->from('App\Entity\Video','v')
            ->where("v.titre LIKE '%".$search."%'");

        $videos =  $qb->getQuery()->getResult();

        $qb->select('t',$qb->expr()->count('tv'))
            ->from('App\Entity\Theme','t')
            ->join('t.idvideo','tv')
            ->where("t.label LIKE '%".$search."%'");

        $themes =  $qb->getQuery()->getResult();
        dump($themes);

        return $this->render('all/search.html.twig',array("usr"=>$session->get("usr"),'videos' => $videos,'themes' => $themes));

    }

    /**
     * @Route("/search", name="searchGet")
     * @Method({"GET"})
     *
     */
    public function redirectSearchGET(){
        return  $this->redirect($this->generateUrl('homepage'));
    }
}
