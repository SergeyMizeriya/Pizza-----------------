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

    public function getParams()
    {
        echo $this->typeOfPizza . '<br>';
        echo $this->sizeOfPizza . '<br>';
        echo print_r($this->sauceForPizza) . '<br>';
    }
}

class AnyPizza extends Pizza
{
}

$newPizza = new AnyPizza('Name', 'Size', ['1', '2']);
$newPizza->getParams();
