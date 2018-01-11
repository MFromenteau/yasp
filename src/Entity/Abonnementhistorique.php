<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Abonnementhistorique
 *
 * @ORM\Table(name="AbonnementHistorique", indexes={@ORM\Index(name="idAbonnement", columns={"idAbonnement"}), @ORM\Index(name="idUtilisateur", columns={"idUtilisateur"}), @ORM\Index(name="idAbonnement_2", columns={"idAbonnement"})})
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
     * @var \DateTime
     *
     * @ORM\Column(name="debut", type="date", nullable=false)
     */
    private $debut;

    /**
     * @var \Abonnement
     *
     * @ORM\ManyToOne(targetEntity="Abonnement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAbonnement", referencedColumnName="idAbonnement")
     * })
     */
    private $idabonnement;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUtilisateur", referencedColumnName="idUtilisateur")
     * })
     */
    private $idutilisateur;


}
