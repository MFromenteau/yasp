<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table(name="Video", uniqueConstraints={@ORM\UniqueConstraint(name="titre", columns={"titre"})})
 * @ORM\Entity
 */
class Video
{
    /**
     * @var int
     *
     * @ORM\Column(name="idVideo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idvideo;

    /**
     * @return int
     */
    public function getIdvideo(): int
    {
        return $this->idvideo;
    }

    /**
     * @param int $idvideo
     */
    public function setIdvideo(int $idvideo): void
    {
        $this->idvideo = $idvideo;
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
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
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
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getTypepath(): string
    {
        return $this->typepath;
    }

    /**
     * @param string $typepath
     */
    public function setTypepath(string $typepath): void
    {
        $this->typepath = $typepath;
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
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdtheme(): \Doctrine\Common\Collections\Collection
    {
        return $this->idtheme;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $idtheme
     */
    public function setIdtheme(\Doctrine\Common\Collections\Collection $idtheme): void
    {
        $this->idtheme = $idtheme;
    }

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=50, nullable=false)
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    private $createdat;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="text", length=65535, nullable=false)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="typePath", type="string", length=3, nullable=false)
     */
    private $typepath;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Theme", inversedBy="idvideo")
     * @ORM\JoinTable(name="TagList",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idVideo", referencedColumnName="idVideo")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idTheme", referencedColumnName="idTheme")
     *   }
     * )
     */
    private $idtheme;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idtheme = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
