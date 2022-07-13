<?php

abstract class Pizza
{
    protected $typeOfPizza;
    protected $sizeOfPizza;
    protected $sauceForPizza;
    private $pizzaIndex;
    private $pizzaSizePrice;
    private $saucePrice;

    public function __construct($name, $size, $sauce)
    {
        $this->typeOfPizza = $name;
        $this->sizeOfPizza = $size;
        $this->sauceForPizza = $sauce;
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

    //добавить методы которые ищут инфу по ценам
    // нужны индекс этой пиццы, цена размера и цена каждого соуса
    private function setPizzaIndex()
    {
        $queryPizzaIndex = "SELECT `index` FROM `pizza_type` WHERE `pizza-input-name` = $this->typeOfPizza";
        $pizzaIndexQuery = mysqli_query($connect, $queryPizzaIndex);
        //$allPizzaTypes = mysqli_fetch_assoc($allPizzaTypes);
        while ($pizzaIndex = mysqli_fetch_assoc($pizzaIndexQuery)) {
            $this->pizzaIndex = $pizzaIndex;
        }
    }

    private function setPizzaSizePrice()
    {
        $queryPizzaSizePrice = "SELECT `price` FROM `pizza_size` WHERE `size-input-value` = $this->sizeOfPizza";
        $pizzaSizePriceQuery = mysqli_query($connect, $queryPizzaSizePrice);
        //$allPizzaTypes = mysqli_fetch_assoc($allPizzaTypes);
        while ($pizzaSizePrice = mysqli_fetch_assoc($pizzaSizePriceQuery)) {
            $this->pizzaSizePrice = $pizzaSizePrice;
        }
    }

    private function setSaucePrice()
    {
        $querySaucePrice = "SELECT * FROM `pizza_sauce` WHERE `sauce-input-name` = $this->sauceForPizza";
        $saucePriceQuery = mysqli_query($connect, $querySaucePrice);
        //$allPizzaTypes = mysqli_fetch_assoc($allPizzaTypes);
        while ($saucePrice = mysqli_fetch_assoc($saucePriceQuery)) {
            $this->saucesPrice = $saucePrice;
        }
    }

    public function getPizzaIndex()
    {
        return $this->pizzaIndex;
    }

    public function getPizzaSizePrice()
    {
        return $this->pizzaSizePrice;
    }

    public function getSaucePrice()
    {
        return $this->saucePrice;
    }
}

class AnyPizza extends Pizza
{
}

// $newPizza = new AnyPizza('Name', 'Size', ['1', '2']);
// $newPizza->getParams();
