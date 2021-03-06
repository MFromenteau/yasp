<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Theme
 *
 * @ORM\Table(name="Theme", uniqueConstraints={@ORM\UniqueConstraint(name="label", columns={"label"})})
 * @ORM\Entity
 */
class Theme
{
    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=30, nullable=false)
     */
    private $label;

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return int
     */
    public function getIdtheme(): int
    {
        return $this->idtheme;
    }

    /**
     * @param int $idtheme
     */
    public function setIdtheme(int $idtheme): void
    {
        $this->idtheme = $idtheme;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdvideo(): \Doctrine\Common\Collections\Collection
    {
        return $this->idvideo;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $idvideo
     */
    public function setIdvideo(\Doctrine\Common\Collections\Collection $idvideo): void
    {
        $this->idvideo = $idvideo;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="idTheme", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtheme;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Video", mappedBy="idtheme")
     */
    private $idvideo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idvideo = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
