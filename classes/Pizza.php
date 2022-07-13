<?php

abstract class Pizza
{
    protected $connect;
    protected $typeOfPizza;
    protected $sizeOfPizza;
    protected $sauceForPizza;
    protected $pizzaIndex;
    protected $pizzaSizePrice;
    protected $saucePrice;

    public function __construct($name, $size, $sauce)
    {
        $this->connect = mysqli_connect('localhost', 'root', '', 'pizza_bd');
        $this->typeOfPizza = $name;
        $this->sizeOfPizza = $size;
        $this->sauceForPizza = $sauce;
    }

    public function getTypeOfPizza()
    {
        echo $this->typeOfPizza;
    }

    public function getSizeOfPizza()
    {
        return $this->sizeOfPizza;
    }

    public function getSauceForPizza()
    {
        return $this->sauceForPizza;
    }


    public function getPizzaIndex()
    {
        $typeOfPizzaVar = mysqli_real_escape_string($this->connect, $this->typeOfPizza);

        $queryPizzaIndex = "SELECT `index` FROM `pizza_type` WHERE `pizza-input-name` = '$typeOfPizzaVar'";
        $pizzaIndexQuery = mysqli_query($this->connect, $queryPizzaIndex);
        while ($pizzaIndex = mysqli_fetch_assoc($pizzaIndexQuery)) {
            return $pizzaIndex['index'];
        }
    }

    public function getPizzaSizePrice()
    {
        $sizeOfPizzaVar = mysqli_real_escape_string($this->connect, $this->sizeOfPizza);

        $queryPizzaSizePrice = "SELECT `price` FROM `pizza_size` WHERE `size` = '$sizeOfPizzaVar'";
        $pizzaSizePriceQuery = mysqli_query($this->connect, $queryPizzaSizePrice);
        while ($pizzaSizePrice = mysqli_fetch_assoc($pizzaSizePriceQuery)) {
            return $pizzaSizePrice['price'];
        }
    }

    public function getSaucePrice()
    {
        $sauceForPizzaVar = mysqli_real_escape_string($this->connect, $this->sauceForPizza);
        $querySaucePrice = "SELECT `price` FROM `pizza_sauce` WHERE `sauce-input-name` = '$sauceForPizzaVar'";
        $saucePriceQuery = mysqli_query($this->connect, $querySaucePrice);
        while ($saucePrice = mysqli_fetch_assoc($saucePriceQuery)) {
            return $saucePrice['price'];
        }
    }
}

class AnyPizza extends Pizza
{
}
