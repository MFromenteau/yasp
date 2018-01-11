<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        $data = array(array('titre' => 'video 1', "description" => "bla bla bla video 1"), array('titre' => 'video 2', "description" => "bla bla bla video 2"), array('titre' => 'video 2', "description" => "bla bla bla video 2"), array('titre' => 'video 2', "description" => "bla bla bla video 2"), array('titre' => 'video 2', "description" => "bla bla bla video 2"));
        return $this->render('all/index.html.twig', ['videos' => $data]);
    }
}
