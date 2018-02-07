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
     * @return \DateTime
     */
    public function getCreatedat(): \DateTime
    {
        return $this->createdat;
    }

    /**
     * @param \DateTime $createdat
     */
    public function setCreatedat(\DateTime $createdat): void
    {
        $this->createdat = $createdat;
    }

    /**
     * @return User
     */
    public function getIdutilisateur(): User
    {
        return $this->idutilisateur;
    }

    /**
     * @param User $idutilisateur
     */
    public function setIdutilisateur(User $idutilisateur): void
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
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    private $createdat;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUtilisateur", referencedColumnName="idUtilisateur")
     * })
     */
    private $idutilisateur;

    /**
     * @var Video
     *
     * @ORM\ManyToOne(targetEntity="Video")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idVideo", referencedColumnName="idVideo")
     * })
     */
    private $idvideo;


}
