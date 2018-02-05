<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Video;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $session = new Session();
        $session->start();
        // replace this example code with whatever you need
        // $data = array(array('titre' => 'video 1', "description" => "bla bla bla video 1"), array('titre' => 'video 2', "description" => "bla bla bla video 2"), array('titre' => 'video 2', "description" => "bla bla bla video 2"), array('titre' => 'video 2', "description" => "bla bla bla video 2"), array('titre' => 'video 2', "description" => "bla bla bla video 2"));

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Video::class);
        $quantity = 10; // Number of rows wanted

        // This is the number of rows in the database
        $totalRowsTable = $repo->createQueryBuilder('a')->select('count(a.idvideo)')->getQuery()->getSingleScalarResult();// This will be in this case 10 because i have 10 records on this table

        $numbers = range(1, $totalRowsTable);
        shuffle($numbers);
        $random_ids = array_slice($numbers, 0, $quantity);

        $random_video = $repo->createQueryBuilder('a')
            ->where('a.idvideo IN (:ids)') // if is another field, change it
            ->setParameter('ids', $random_ids)
            ->setMaxResults(3)// Add this line if you want to give a limit to the records (if all the ids exists then you would like to give a limit)
            ->getQuery()
            ->getResult();

        return $this->render('all/index.html.twig', ['videos' => $random_video,"usr"=>$session->get("usr")]);
    }

    /**
     * @Route("/legal", name="legal")
     */
    public function legalNotice()
    {
        $session = new Session();
        $session->start();

        return $this->render('all/legal.html.twig',['usr'=>$session->get('usr')]);
    }

}
