<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="Commentaire", indexes={@ORM\Index(name="idVideo", columns={"idVideo"}), @ORM\Index(name="idUtilisateur", columns={"idUtilisateur"})})
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
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return int
     */
    public function getIdutilisateur(): int
    {
        return $this->idutilisateur;
    }

    /**
     * @param int $idutilisateur
     */
    public function setIdutilisateur(int $idutilisateur): void
    {
        $this->idutilisateur = $idutilisateur;
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

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", length=65535, nullable=false)
     */
    private $message;

    /**
     * @var int
     *
     * @ORM\Column(name="idUtilisateur", type="integer", nullable=false)
     */
    private $idutilisateur;

    /**
     * @var \Video
     *
     * @ORM\ManyToOne(targetEntity="Video")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idVideo", referencedColumnName="idVideo")
     * })
     */
    private $idvideo;


}
