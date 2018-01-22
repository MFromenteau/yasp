<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="Commentaire", indexes={@ORM\Index(name="idVideo", columns={"idVideo"})})
 * @ORM\Entity
 */
class Commentaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCommentaire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcommentaire;

    /**
     * @var int
     *
     * @ORM\Column(name="message", type="integer", nullable=false)
     */
    private $message;

    /**
     * @var \Video
     *
     * @ORM\ManyToOne(targetEntity="Video")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idVideo", referencedColumnName="idVideo")
     * })
     */
    private $idvideo;

    /**
     * @return int
     */
    public function getIdcommentaire(): int
    {
        return $this->idcommentaire;
    }

    /**
     * @param int $idcommentaire
     */
    public function setIdcommentaire(int $idcommentaire): void
    {
        $this->idcommentaire = $idcommentaire;
    }

    /**
     * @return int
     */
    public function getMessage(): int
    {
        return $this->message;
    }

    /**
     * @param int $message
     */
    public function setMessage(int $message): void
    {
        $this->message = $message;
    }

    /**
     * @return Video
     */
    public function getIdvideo(): Video
    {
        return $this->idvideo;
    }

    /**
     * @param Video $idvideo
     */
    public function setIdvideo(Video $idvideo): void
    {
        $this->idvideo = $idvideo;
    }


}
