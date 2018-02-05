<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="Orders", indexes={@ORM\Index(name="idOrders", columns={"idOrders"}), @ORM\Index(name="user", columns={"idRecipient"})})
 * @ORM\Entity
 */
class Orders
{
    /**
     * @var int
     *
     * @ORM\Column(name="idOrders", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOrders;

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
     * @return float
     */
    public function getTotalprice(): float
    {
        return $this->totalprice;
    }

    /**
     * @param float $totalprice
     */
    public function setTotalprice(float $totalprice): void
    {
        $this->totalprice = $totalprice;
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
     * @return int
     */
    public function getIdrecipient(): int
    {
        return $this->idrecipient;
    }

    /**
     * @param int $idrecipient
     */
    public function setIdrecipient(int $idrecipient): void
    {
        $this->idrecipient = $idrecipient;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1500, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="totalPrice", type="float", precision=10, scale=0, nullable=false)
     */
    private $totalprice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    private $createdat;

    /**
     * @var int
     *
     * @ORM\Column(name="idRecipient", type="integer", nullable=false)
     */
    private $idrecipient;


}
