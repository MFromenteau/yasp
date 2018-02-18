<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use App\Entity\Video;


/**
 * @Route("/search")
 */
class SearchCtrl extends Controller
{

    /**
     * @Route("", name="searchvid")
     * @Method({"POST"})
     */
    public function search(Request $request)
    {
        $session = new Session();
        $session->start();

        $search = $request->request->get('search');

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
        $qb->select('v','t')
            ->from('App\Entity\Video','v')
            ->join('v.idtheme','t')
            ->where("v.titre LIKE '%".$search."%'");

        $videos =  $qb->getQuery()->getResult();

        $qb2 = $em->createQueryBuilder();

        $qb2->select('t',$qb2->expr()->count('tv'))
            ->from('App\Entity\Theme','t')
            ->join('t.idvideo','tv')
            ->where("t.label LIKE '%".$search."%'");

        $themes =  $qb2->getQuery()->getResult();
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


    /**
     * @Route("/video/by/theme", name="searchGet")
     * @Method({"POST"})
     *
     */
    public function getVideoByIdTheme(Request $request){
        $session = new Session();
        $session->start();

        $idTheme = $request->request->get('selectedIdTheme');

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();


        if(!empty($idTheme)){
            $videos= $qb->select('v','tv')
                ->from('App\Entity\Video', 'v')
                ->join('v.idtheme','tv')
                ->Where("tv.idtheme = ".$idTheme);
            $videos = $qb->getQuery()->getResult();
            dump($videos);

            $encoders = array(new XmlEncoder(), new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());


            $serializer = new Serializer($normalizers, $encoders);
            return new JsonResponse($serializer->serialize($videos, 'json'));
        }else{
            $response = new Response();
            $response->setStatusCode(500);
            return $response;
        }



    }

}