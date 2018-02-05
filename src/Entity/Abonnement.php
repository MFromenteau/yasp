<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abonnement
 *
 * @ORM\Table(name="Abonnement")
 * @ORM\Entity
 */
class Abonnement
{
    /**
     * @var int
     *
     * @ORM\Column(name="idAbonnement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idabonnement;

    /**
     * @return int
     */
    public function getIdabonnement(): int
    {
        return $this->idabonnement;
    }

    /**
     * @param int $idabonnement
     */
    public function setIdabonnement(int $idabonnement): void
    {
        $this->idabonnement = $idabonnement;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return float
     */
    public function getDuree(): float
    {
        return $this->duree;
    }

    /**
     * @param float $duree
     */
    public function setDuree(float $duree): void
    {
        $this->duree = $duree;
    }

    /**
     * @return float
     */
    public function getPrix(): float
    {
        return $this->prix;
    }

    /**
     * @param float $prix
     */
    public function setPrix(float $prix): void
    {
        $this->prix = $prix;
    }

    /**
     * @return string
     */
    public function getDesc(): string
    {
        return $this->desc ? $this->desc : "";
    }

    /**
     * @param string $desc
     */
    public function setDesc(string $desc): void
    {
        $this->desc = $desc;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @var float
     *
     * @ORM\Column(name="duree", type="float", precision=10, scale=0, nullable=false)
     */
    private $duree;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="desc", type="text", length=250, nullable=true)
     */
    private $desc;


}
