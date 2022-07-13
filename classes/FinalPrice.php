<?php

class FinalPrice
{
    private $price;

    public function __construct($pizzaPriceIndex, $sizePrice, $saucePrice)
    {
        $this->price = (($pizzaPriceIndex * $sizePrice) + $saucePrice);
    }

    public function getPrice()
    {
        echo $this->price;
    }
}
