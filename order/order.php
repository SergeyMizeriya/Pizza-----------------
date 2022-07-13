<?
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once('../connect.php');
require_once('../classes/Pizza.php');
require_once('../classes/FinalPrice.php');

$pizzaFromOrder = array_shift($_POST);
$sizeFromOrder = array_shift($_POST);
$sauceFromOrder = array_shift($_POST);

$newPizza = new AnyPizza($pizzaFromOrder, $sizeFromOrder, $sauceFromOrder);

$newFinalPrice = new FinalPrice($newPizza->getPizzaIndex(), $newPizza->getPizzaSizePrice(), $newPizza->getSaucePrice());

$newFinalPrice->getPrice();
