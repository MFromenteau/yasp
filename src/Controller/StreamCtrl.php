<?php
/**
 * Created by PhpStorm.
 * User: Alexa
 * Date: 18/02/2018
 * Time: 20:57
 */

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Video;
use App\VideoStream;

/**
 * @Route("/stream")
 */
class StreamCtrl extends Controller
{

    /**
     * @Route("/{idv}", name="getStreamById" , requirements={"idv"="\d+"})
     * @param $id
     * Return a video stream
     */
    public function getStream($idv){
        $session = new Session();
        $session->start();
        $em = $this->getDoctrine()->getManager();
        $comment = null;

        $video = $this->getDoctrine()
            ->getRepository(Video::class)
            ->find($idv);

        if (!$video) {
            die("No video found at this id.");
        }

        //do not ove this instruction, it is neede deven if user is subscribed
        $bought = null;
        if($video->getPrix() != 0) {
            if(UserCtrl::isLoggedIn($session,$this) != "OK"){die("User not connected.");}

            $bought = VideoCtrl::getLibByUserVid($idv, $session->get('usr')->getIdutilisateur(), $em);

            if(!AbonnementCtrl::isAboValid(AbonnementCtrl::getLastPurchasedAbonnement($session,$em))){
                if (!$bought)
                    die("Video not brought.");
            }
        }

        if($video->getTypepath() == "LCL"){
            $stream = new VideoStream($video->getPath());
            $stream->start();
        }
    }
}