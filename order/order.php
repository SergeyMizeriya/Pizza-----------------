<?

// ВЫВОД ОШИБОК
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// ПОДКЛЮЧЕНИЕ НЕОБХОДИМЫХ ФАЙЛОВ
require_once('../connect.php');
require_once('../classes/Pizza.php');
require_once('../classes/FinalPrice.php');

// ОБРАБОТКА МАССИВА POST
$pizzaFromOrder = array_shift($_POST);
$sizeFromOrder = array_shift($_POST);
$sauceFromOrder = array_shift($_POST);

// СОЗДАНИЕ ЭКЗЕМПЛЯРА КЛАССА ДЛЯ ВСЕХ ВИДОВ ПИЦЦ
$newPizza = new AnyPizza($pizzaFromOrder, $sizeFromOrder, $sauceFromOrder);

// СОЗДАНИЕ ЭКЗЕМПЛЯРА КЛАССА ДЛЯ ВЫВОДА СТОИМОСТИ ЗАКАЗА 
$newFinalPrice = new FinalPrice($newPizza->getPizzaIndex(), $newPizza->getPizzaSizePrice(), $newPizza->getSaucePrice());

// ВЫВОД СТОИМОСТИ ЗАКАЗА 
$newFinalPrice->getPrice();
