<?php

class FinalPrice
{
    private $price;

    public function __construct($pizzaPriceIndex, $sizePrice, $sauceArr)
    {
        $this->price = ($pizzaPriceIndex * $sizePrice) + $sauceArr;
    }

    public function getPrice()
    {
        echo $this->price;
    }
}
