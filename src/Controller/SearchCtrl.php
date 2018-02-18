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
        $AllWord = explode(" ", $search);

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
        $qb->select('v','t')
            ->from('App\Entity\Video','v')
            ->join('v.idtheme','t');

        foreach ($AllWord as $key => $value) {
            if($key == 0){
                $qb->where("v.titre LIKE '%".$value."%'");
            }else{
                $qb->orWhere("v.titre LIKE '%".$value."%'");
            }
        }


        $videos =  $qb->getQuery()->getResult();

        $qb2 = $em->createQueryBuilder();

        $qb2->select('t',$qb2->expr()->count('tv'))
            ->from('App\Entity\Theme','t')
            ->join('t.idvideo','tv');

        foreach ($AllWord as $key => $value) {
            if($key == 0){
                $qb2->where("t.label LIKE '%".$value."%'");
            }else{
                $qb2->orWhere("t.label LIKE '%".$value."%'");
            }
        }

        $qb2->groupBy('t.label');

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
     * @Route("/video/by/theme", name="seachVideoByIdTheme")
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
            $videos = $qb->getQuery()->getArrayResult();
            return new JsonResponse($videos);
        }else{
            $response = new Response();
            $response->setStatusCode(500);
            return $response;
        }



    }

}