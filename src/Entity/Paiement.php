<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Paiement
 *
 * @ORM\Table(name="Paiement", indexes={@ORM\Index(name="idUtilisateur", columns={"idRecipient"}), @ORM\Index(name="idVideo", columns={"idVideo"})})
 * @ORM\Entity
 */
class Paiement
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPaiement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpaiement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    private $createdat;

    /**
     * @var float
     *
     * @ORM\Column(name="somme", type="float", precision=10, scale=0, nullable=false)
     */
    private $somme;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idRecipient", referencedColumnName="idUtilisateur")
     * })
     */
    private $idrecipient;

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
    public function getIdpaiement(): int
    {
        return $this->idpaiement;
    }

    /**
     * @param int $idpaiement
     */
    public function setIdpaiement(int $idpaiement): void
    {
        $this->idpaiement = $idpaiement;
    }

    /**
     * @return DateTime
     */
    public function getCreatedat(): DateTime
    {
        return $this->createdat;
    }

    /**
     * @param DateTime $createdat
     */
    public function setCreatedat(DateTime $createdat): void
    {
        $this->createdat = $createdat;
    }

    /**
     * @return float
     */
    public function getSomme(): float
    {
        return $this->somme;
    }

    /**
     * @param float $somme
     */
    public function setSomme(float $somme): void
    {
        $this->somme = $somme;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return User
     */
    public function getIdrecipient(): User
    {
        return $this->idrecipient;
    }

    /**
     * @param User $idrecipient
     */
    public function setIdrecipient(User $idrecipient): void
    {
        $this->idrecipient = $idrecipient;
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
