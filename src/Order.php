<?php
/**
 * Created by PhpStorm.
 * User: Alexa
 * Date: 03/02/2018
 * Time: 16:54
 */

namespace App;

class ORDER_STATUS {
    public const TO_CONFIRM = 0;
    public const CONFIRMED  = 1;
    public const CANCELED   = 3;
    public const TERMINATED = 4;
}

class Order
{
    private $descList;
    private $totalPrice;
    private $status;

    function __construct() {
        $this->descList = [];
        $this->totalPrice = 0;
        $this->status = ORDER_STATUS::TO_CONFIRM;
    }

    /**
     * @return string
     */
    public function getDescList(): array
    {
        return $this->descList;
    }

    /**
     * @return int
     */
    public function getTotalPrice(): int
    {
        return $this->totalPrice;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus($s)
    {
        $this->status = $s;
    }

    public function addProduct($pDesc,$pPrice){
        $this->totalPrice += $pPrice;
        array_push($this->descList,$pDesc);
    }
}