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
     * @return \Orders
     */
    public function getIdOrders(): \Orders
    {
        return $this->idOrders;
    }

    /**
     * @param \Orders $idOrders
     */
    public function setIdOrders(\Orders $idOrders): void
    {
        $this->idOrders = $idOrders;
    }

    /**
     * @return \User
     */
    public function getIdowner(): \User
    {
        return $this->idowner;
    }

    /**
     * @param \User $idowner
     */
    public function setIdowner(\User $idowner): void
    {
        $this->idowner = $idowner;
    }

    /**
     * @return \Video
     */
    public function getIdvideo(): \Video
    {
        return $this->idvideo;
    }

    /**
     * @param \Video $idvideo
     */
    public function setIdvideo(\Video $idvideo): void
    {
        $this->idvideo = $idvideo;
    }

    /**
     * @var \Orders
     *
     * @ORM\ManyToOne(targetEntity="Orders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idOrders", referencedColumnName="idOrders")
     * })
     */
    private $idOrders;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idOwner", referencedColumnName="idUtilisateur")
     * })
     */
    private $idowner;

    /**
     * @var \Video
     *
     * @ORM\ManyToOne(targetEntity="Video")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idVideo", referencedColumnName="idVideo")
     * })
     */
    private $idvideo;


}
