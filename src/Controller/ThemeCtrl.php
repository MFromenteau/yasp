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

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;


/**
 * @Route("/theme")
 */
class ThemeCtrl extends Controller
{

    /**
     * @Route("/{id}", name="getVideoByThemeId" , requirements={"id"="\d+"})
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response retourne la vue correspondante à la video
     * ou 404 si theme absent
     */
	public function getVideoByThemeId($id){
        $session = new Session();
        $session->start();
        $em = $this->getDoctrine()->getManager();

        $video = $this->getDoctrine()
            ->getRepository(Video::class)
            ->findBy([
                'idvideo' => $id
            ]);


        if (!$video) {
            return $this->render('all/404.html.twig',['usr'=>$session->get('usr')]);
        }

       return $this->render('all/theme.html.twig',array(
            "usr"=>$session->get("usr"),
            'videos' => $video)
        );
	}

}
