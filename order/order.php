<?
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once('../connect.php');
require_once('../classes/Pizza.php');
require_once('../classes/FinalPrice.php');

// print_r($_POST);

// первый элемент в один массив 
// второй во второй 
// остальные перебором 

$pizzaFromOrder = array_shift($_POST);
$sizeFromOrder = array_shift($_POST);
$sauceFromOrder = array_shift($_POST);


echo $pizzaFromOrder;
echo $sizeFromOrder;
print_r($sauceFromOrder);

$newPizza = new AnyPizza($pizzaFromOrder, $sizeFromOrder, $sauceFromOrder);
$newFinalprice = new FinalPrice($newPizza->getPizzaIndex(), $newPizza->getPizzaSizePrice(), $newPizza->getSaucePrice());

$newFinalprice->getPrice();
//ДЕЛАЕМ ТУТ ЗАКАЗ С ИСПОЛЬЗОВАНИЕМ КЛАССОВ ИЗ classes

// echo 'страница order.php' . '<br>';

//сюда приходит AJAX запрос с данными формы
// делаем пиццу new AnyPizza()
// метод от AnyPizza возвращает цены на пиццу, размер и соус(ы)
// отправляем цены в FinalPrice
// принимаем FinalPrice->$price и возвращаем AJAXу

// if (isset($_POST['username']) && $_POST['username'] && isset($_POST['password']) && $_POST['password']) {
//     // do user authentication as per your requirements
//     // ...
//     // ...
//     // based on successful authentication
//     // echo json_encode(array('success' => 1));

//     echo $_POST['username'] + 6;
// } else {
//     // echo json_encode(array('success' => 0));
// }
