<?php

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

}
