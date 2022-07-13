<?php

abstract class Pizza
{
    private $typeOfPizza;
    private $sizeOfPizza;
    private $sauceForPizza;

    public function __construct($name, $size, $sauce)
    {
        $this->typeOfPizza = $name;
        $this->sizeOfPizza = $size;
        $this->sauceForPizza[] = $sauce;
    }

    public function getTypeOfPizza()
    {
        return $this->typeOfPizza;
    }

    public function getSizeOfPizza()
    {
        return $this->sizeOfPizza;
    }

    public function getSauceForPizza()
    {
        return $this->sauceForPizza;
    }
}

class AnyPizza extends Pizza
{
}

// $newPizza = new AnyPizza('Name', 'Size', ['1', '2']);
// $newPizza->getParams();
