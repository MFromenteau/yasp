<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="User", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"email"})}, indexes={@ORM\Index(name="User_idUtilisateur_index", columns={"idUtilisateur"})})
 * @ORM\Entity
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="idUtilisateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idutilisateur;

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
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
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
     * @return string
     */
    public function getPsw(): string
    {
        return $this->psw;
    }

    /**
     * @param string $psw
     */
    public function setPsw(string $psw): void
    {
        $this->psw = $psw;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="psw", type="string", length=255, nullable=false)
     */
    private $psw;

    /**
     * @var string
     *
     * @ORM\Column(name="urlAvatar", type="text", nullable=false)
     */
    private $urlavatar;

    /**
     * @return string
     */
    public function getUrlavatar()
    {
        return $this->urlavatar;
    }

    /**
     * @param string $urlAvatar
     */
    public function setUrlavatar($urlAvatar)
    {
        $this->urlavatar = $urlAvatar;
    }
    /**
     * @var int
     *
     * @ORM\Column(name="accountDelete", type="integer")
     */
    private $accountDelete;

    /**
     * @return int
     */
    public function getAccountDelete(){
        return $this->accountDelete;
    }
    /**
     * @param int $accountDelete
     */
    public function setAccountDelete(int $accountDelete): void
    {
        $this->accountDelete = $accountDelete;
    }

}
