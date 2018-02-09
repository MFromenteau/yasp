<?php
/**
 * Created by PhpStorm.
 * User: Alexa
 * Date: 07/02/2018
 * Time: 16:17
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


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
        $qb->select('v')
            ->from('App\Entity\Video','v')
            ->where("v.titre LIKE '%".$search."%'");

        $videos =  $qb->getQuery()->getResult();

        $qb2 = $em->createQueryBuilder();

        $qb2->select('t',$qb2->expr()->count('tv'))
            ->from('App\Entity\Theme','t')
            ->join('t.idvideo','tv')
            ->where("t.label LIKE '%".$search."%'");

        $themes =  $qb2->getQuery()->getResult();

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