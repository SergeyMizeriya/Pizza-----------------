<?php
//$connect = mysqli_connect('localhost', 'root', '', 'pizza_bd');
// $connect_users = mysqli_connect('localhost', 'root', '', 'test');

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

    //добавить методы которые ищут инфу по ценам
    // нужны индекс этой пиццы, цена размера и цена каждого соуса
    public function getPizzaIndex()
    {
        $typeOfPizzaVar = mysqli_real_escape_string($this->connect, $this->typeOfPizza);

        $queryPizzaIndex = "SELECT `index` FROM `pizza_type` WHERE `pizza-input-name` = '$typeOfPizzaVar'";
        $pizzaIndexQuery = mysqli_query($this->connect, $queryPizzaIndex);
        //$allPizzaTypes = mysqli_fetch_assoc($allPizzaTypes);
        while ($pizzaIndex = mysqli_fetch_assoc($pizzaIndexQuery)) {
            return $pizzaIndex['index'];
        }
    }

    public function getPizzaSizePrice()
    {
        $sizeOfPizzaVar = mysqli_real_escape_string($this->connect, $this->sizeOfPizza);

        $queryPizzaSizePrice = "SELECT `price` FROM `pizza_size` WHERE `size` = '$sizeOfPizzaVar'";
        $pizzaSizePriceQuery = mysqli_query($this->connect, $queryPizzaSizePrice);
        //$allPizzaTypes = mysqli_fetch_assoc($allPizzaTypes);
        while ($pizzaSizePrice = mysqli_fetch_assoc($pizzaSizePriceQuery)) {
            return $pizzaSizePrice['price'];
        }
    }

    public function getSaucePrice()
    {
        $sauceForPizzaVar = mysqli_real_escape_string($this->connect, $this->sauceForPizza);
        $querySaucePrice = "SELECT `price` FROM `pizza_sauce` WHERE `sauce-input-name` = '$sauceForPizzaVar'";
        $saucePriceQuery = mysqli_query($this->connect, $querySaucePrice);
        //$allPizzaTypes = mysqli_fetch_assoc($allPizzaTypes);
        while ($saucePrice = mysqli_fetch_assoc($saucePriceQuery)) {
            return $saucePrice['price'];
        }
    }

    public function test()
    {
        // echo 'testtt123<br>';
        // echo $this->getTypeOfPizza();
        // echo $this->typeOfPizza;
        // echo $this->sizeOfPizza;
        // echo $this->sauceForPizza;
        echo ' | ';
        echo ' | ';
        // $this->getPizzaSizePrice();
        echo ' | ';
        // $this->getPizzaSizePrice();
        // $this->getSaucePrice();
        // "SELECT `index` FROM `pizza_type` WHERE `pizza-input-name` = '$this->typeOfPizza'"
        $queryPizzaIndex =
            "SELECT `price` FROM `pizza_size` WHERE `size` = '$this->sizeOfPizza'";
        $pizzaIndexQuery = mysqli_query($this->connect, $queryPizzaIndex);
        //$allPizzaTypes = mysqli_fetch_assoc($allPizzaTypes);
        while ($pizzaIndex = mysqli_fetch_assoc($pizzaIndexQuery)) {
            echo $pizzaIndex['price'];
        }
    }
}

class AnyPizza extends Pizza
{
}
