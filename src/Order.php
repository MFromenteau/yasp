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
    public const TO_PAY     = 4;
    public const TERMINATED = 5;
}

class Order
{
    private $descList;
    private $totalPrice;
    private $status;
    private $descPriceList;
    private $md5;

    /**
     * @return array
     */
    public function getDescPriceList(): array
    {
        return $this->descPriceList;
    }


    /**
     * @return mixed
     */
    public function getMd5()
    {
        return $this->md5;
    }

    /**
     * @param mixed $md5
     */
    public function generateMd5($idUser): void
    {
        $md5 = md5($_ENV['SALT'].$this->getDescConcat().$idUser.date('U'));
        $this->md5 = $md5;
    }

    function __construct() {
        $this->descList = [];
        $this->descPriceList = [];
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
     * @return string
     */
    public function getDescConcat(): string
    {
        $res = "";
        foreach ($this->descList as $d){
            $res .= $d." ";
        }

        return $res;
    }

    /**
     * @return int
     */
    public function getTotalPrice(): float
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
        array_push($this->descPriceList,['desc'=>$pDesc,'price'=>$pPrice]);
    }
}