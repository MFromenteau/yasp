<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="User")
 * @ORM\Entity
 */
class User
{
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     * @ORM\Id
     */
    private $email;

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
     * @return int
     */
    public function getIdutilisateur(): int
    {
        return $this->idutilisateur;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="idUtilisateur", type="integer", nullable=false, options={"autoincrement":true})
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idutilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="text", length=65535, nullable=false)
     */
    private $prenom;

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
     * @var string
     *
     * @ORM\Column(name="nom", type="text", length=65535, nullable=false)
     */
    private $nom;

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
     * @ORM\Column(name="psw", type="text", length=65535, nullable=false)
     */
    private $psw;


}
