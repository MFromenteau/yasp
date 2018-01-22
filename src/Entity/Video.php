<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table(name="Video")
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
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="text", length=65535, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="text", length=65535, nullable=false)
     */
    private $url;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Theme", inversedBy="idvideo")
     * @ORM\JoinTable(name="taglist",
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
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
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


}
