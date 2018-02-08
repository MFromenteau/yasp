<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Library
 *
 * @ORM\Table(name="Library", indexes={@ORM\Index(name="idVideo", columns={"idVideo"}), @ORM\Index(name="FK_Library_Orders", columns={"idOrders"}), @ORM\Index(name="FK_Library_User", columns={"idOwner"})})
 * @ORM\Entity
 */
class Library
{
    /**
     * @var int
     *
     * @ORM\Column(name="idLibrary", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlibrary;

    /**
     * @return int
     */
    public function getIdlibrary(): int
    {
        return $this->idlibrary;
    }

    /**
     * @param int $idlibrary
     */
    public function setIdlibrary(int $idlibrary): void
    {
        $this->idlibrary = $idlibrary;
    }

    /**
     * @return int
     */
    public function getIdOrders(): int
    {
        return $this->idOrders;
    }

    /**
     * @param int $idOrders
     */
    public function setIdOrders(int $idOrders): void
    {
        $this->idOrders = $idOrders;
    }

    /**
     * @return int
     */
    public function getIdowner(): int
    {
        return $this->idowner;
    }

    /**
     * @param int $idowner
     */
    public function setIdowner(int $idowner): void
    {
        $this->idowner = $idowner;
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
     * @var int
     *
     * @ORM\Column(name="idOrders", type="integer", nullable=false)
     */
    private $idOrders;

    /**
     * @var int
     *
     * @ORM\Column(name="idOwner", type="integer", nullable=false)
     */
    private $idowner;

    /**
     * @var int
     *
     * @ORM\Column(name="idVideo", type="integer", nullable=false)
     */
    private $idvideo;


}
