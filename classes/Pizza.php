<?php
//$connect = mysqli_connect('localhost', 'root', '', 'pizza_bd');
// $connect_users = mysqli_connect('localhost', 'root', '', 'test');

abstract class Pizza
{
    public $connect;
    protected $typeOfPizza;
    protected $sizeOfPizza;
    protected $sauceForPizza;
    private $pizzaIndex;
    private $pizzaSizePrice;
    private $saucePrice;

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
    private function setPizzaIndex()
    {
        $queryPizzaIndex = "SELECT `index` FROM `pizza_type` WHERE `pizza-input-name` = '$this->typeOfPizza'";
        $pizzaIndexQuery = mysqli_query($this->connect, $queryPizzaIndex);
        //$allPizzaTypes = mysqli_fetch_assoc($allPizzaTypes);
        while ($pizzaIndex = mysqli_fetch_assoc($pizzaIndexQuery)) {
            $this->pizzaIndex = $pizzaIndex['index'];
        }
    }

    private function setPizzaSizePrice()
    {
        $queryPizzaSizePrice = "SELECT `price` FROM `pizza_size` WHERE `size-input-value` = '$this->sizeOfPizza'";
        $pizzaSizePriceQuery = mysqli_query($this->connect, $queryPizzaSizePrice);
        //$allPizzaTypes = mysqli_fetch_assoc($allPizzaTypes);
        while ($pizzaSizePrice = mysqli_fetch_assoc($pizzaSizePriceQuery)) {
            $this->pizzaSizePrice = $pizzaSizePrice['price'];
        }
    }

    private function setSaucePrice()
    {
        $querySaucePrice = "SELECT `price` FROM `pizza_sauce` WHERE `sauce-input-name` = '$this->sauceForPizza'";
        $saucePriceQuery = mysqli_query($this->connect, $querySaucePrice);
        //$allPizzaTypes = mysqli_fetch_assoc($allPizzaTypes);
        while ($saucePrice = mysqli_fetch_assoc($saucePriceQuery)) {
            $this->saucesPrice = $saucePrice['price'];
        }
    }

    public function getPizzaIndex()
    {
        echo $this->pizzaIndex;
    }

    public function getPizzaSizePrice()
    {
        return $this->pizzaSizePrice;
    }

    public function getSaucePrice()
    {
        return $this->saucePrice;
    }

    public function test()
    {
        // echo 'testtt123<br>';
        // echo $this->getTypeOfPizza();
        // echo $this->typeOfPizza;
        // echo $this->sizeOfPizza;
        // echo $this->sauceForPizza;
        // echo '<br>testtt987';
        // echo $this->getPizzaIndex();
        // echo $this->getPizzaSizePrice();
        // echo $this->getSaucePrice();
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

// $newPizza = new AnyPizza('Name', 'Size', ['1', '2']);
// $newPizza->getParams();
