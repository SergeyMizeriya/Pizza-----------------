<?
//ДЕЛАЕМ ТУТ ЗАКАЗ С ИСПОЛЬЗОВАНИЕМ КЛАССОВ ИЗ classes
require_once('./classes/Pizza.php');
require_once('./classes/FinalPrice.php');

print_r($_POST);
//сюда приходит AJAX запрос с данными формы
// делаем пиццу new AnyPizza()
// метод от AnyPizza возвращает цены на пиццу, размер и соус(ы)
// отправляем цены в FinalPrice
// принимаем FinalPrice->$price и возвращаем AJAXу

if (isset($_POST['username']) && $_POST['username'] && isset($_POST['password']) && $_POST['password']) {
    // do user authentication as per your requirements
    // ...
    // ...
    // based on successful authentication
    // echo json_encode(array('success' => 1));

    echo $_POST['username'] + 6;
} else {
    // echo json_encode(array('success' => 0));
}
