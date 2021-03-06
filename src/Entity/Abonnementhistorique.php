<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abonnementhistorique
 *
 * @ORM\Table(name="AbonnementHistorique", indexes={@ORM\Index(name="idAbonnement", columns={"idAbonnement"}), @ORM\Index(name="idUtilisateur", columns={"idUtilisateur"}), @ORM\Index(name="idOrders", columns={"idOrders"})})
 * @ORM\Entity
 */
class Abonnementhistorique
{
    /**
     * @var int
     *
     * @ORM\Column(name="idAbonnementHistorique", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idabonnementhistorique;

    /**
     * @return int
     */
    public function getIdabonnementhistorique(): int
    {
        return $this->idabonnementhistorique;
    }

    /**
     * @param int $idabonnementhistorique
     */
    public function setIdabonnementhistorique(int $idabonnementhistorique): void
    {
        $this->idabonnementhistorique = $idabonnementhistorique;
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
     * @return Orders
     */
    public function getIdOrders(): Orders
    {
        return $this->idOrders;
    }

    /**
     * @param Orders $idOrders
     */
    public function setIdOrders(Orders $idOrders): void
    {
        $this->idOrders = $idOrders;
    }

    /**
     * @return Abonnement
     */
    public function getIdabonnement(): Abonnement
    {
        return $this->idabonnement;
    }

    /**
     * @param Abonnement $idabonnement
     */
    public function setIdabonnement(Abonnement $idabonnement): void
    {
        $this->idabonnement = $idabonnement;
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
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    private $createdat;

    /**
     * @var Orders
     *
     * @ORM\ManyToOne(targetEntity="Orders",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idOrders", referencedColumnName="idOrders")
     * })
     */
    private $idOrders;

    /**
     * @var Abonnement
     *
     * @ORM\ManyToOne(targetEntity="Abonnement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAbonnement", referencedColumnName="idAbonnement")
     * })
     */
    private $idabonnement;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User",cascade={"merge"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUtilisateur", referencedColumnName="idUtilisateur")
     * })
     */
    private $idutilisateur;


}
