<?php

/** 
 * 
 * СОЗДАН АБСТРАКТНЫЙ КЛАСС 
 * 
 * НО ТАК КАК ЗАКАЗАТЬ МОЖНО ТОЛЬКО ОДНУ ПИЦЦУ,
 * ИЗ АБСТРАКТНОГО КЛАССА СОЗДАЕТСЯ КЛАСС AnyPizza
 * ДЛЯ РАБОТЫ С ЛЮБОЙ ПИЦЦЕЙ
 * 
 * ВСЕ ДАННЫЕ ПОСТУПАЮТ В НЕГО, ОН ИХ ОБРАБАТЫВАЕТ
 * ЗАТЕМ МЫ ЭТИ ДАННЫЕ ИСПОЛЬЗУЕМ В КЛАССЕ FinalPrice
 * ДЛЯ ПОДСЧЕТА СТОИМОСТИ ЗАКАЗА И ВОЗВРАЩАЕМ СТОИМОСТЬ AJAXу
 * 
 * СКРИПТ AJAX ИХ ОБРАБАТЫВАЕТ И ВЫВОДИТ СТОТИМОСТЬ В ВАЛЮТАХ BYN И USD
 * 
 * 
 */
// СОЗДАНИЕ АБСТРАКТНОГО КЛАССА ПИЦЦ 
abstract class Pizza
{
    protected $connect; //ПОДКЛЮЧЕНИЕ
    protected $typeOfPizza; // ТИП ПИЦЦЫ
    protected $sizeOfPizza; // РАЗМЕР ПИЦЦЫ
    protected $sauceForPizza; // СОУС ДЛЯ ПИЦЦЫ
    protected $pizzaIndex; // ПОЛУЧЕННЫЙ ИНДЕКС СТОИМОСТИ ПИЦЦЫ
    protected $pizzaSizePrice; // ПОЛУЧЕННАЯ СТОИМОССТЬ ПИЦЦЫ ПО РАЗМЕРУ
    protected $saucePrice; // ПОЛУЧЕННАЯ СТОИМОСТЬ СОУСА ДЛЯ ПИЦЦЫ

    // КОНСТРУКТОР КЛАССА
    public function __construct($name, $size, $sauce)
    {
        $this->connect = mysqli_connect('localhost', 'root', '', 'pizza_bd');
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
    /**
     * 
     * В БАЗЕ ДАННЫХ В ТАБЛИЦЕ ПИЦЦ ПРОПИСАН ИНДЕКС,
     * В ТАБЛИЦЕ РАЗМЕРОВ ПИЦЦ ПРОПИСАНА ЦЕНА.
     * ТАКИМ ОБРАЗОМ: СУММА ЗАКАЗА = (ИНДЕКС ТИПА ПИЦЦЫ * СТОИМОСТЬ РАЗМЕРА ПИЦЦЫ) + СТОИМОСТЬ СОУСА 
     * 
     */
    // МЕТОД ПОЛУЧАЕТ В БД ИНДЕКС СТОИМОСТИ ПИЦЦЫ
    public function getPizzaIndex()
    {
        $typeOfPizzaVar = mysqli_real_escape_string($this->connect, $this->typeOfPizza);

        $queryPizzaIndex = "SELECT `index` FROM `pizza_type` WHERE `pizza-input-name` = '$typeOfPizzaVar'";
        $pizzaIndexQuery = mysqli_query($this->connect, $queryPizzaIndex);
        while ($pizzaIndex = mysqli_fetch_assoc($pizzaIndexQuery)) {
            return $pizzaIndex['index'];
        }
    }

    // МЕТОД ПОЛУЧАЕТ В БД СТОИМОСТЬ ПИЦЦЫ В ЗАВИСИМОСТИ ОТ РАЗМЕРА
    public function getPizzaSizePrice()
    {
        $sizeOfPizzaVar = mysqli_real_escape_string($this->connect, $this->sizeOfPizza);

        $queryPizzaSizePrice = "SELECT `price` FROM `pizza_size` WHERE `size` = '$sizeOfPizzaVar'";
        $pizzaSizePriceQuery = mysqli_query($this->connect, $queryPizzaSizePrice);
        while ($pizzaSizePrice = mysqli_fetch_assoc($pizzaSizePriceQuery)) {
            return $pizzaSizePrice['price'];
        }
    }

    // МЕТОД ПОЛУЧАЕТ СТОИМОСТЬ СОУСА
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

// КЛАСС ДЛЯ РАБОТЫ С ЗАКАЗОМ ПИЦЦЫ
class AnyPizza extends Pizza
{
}
