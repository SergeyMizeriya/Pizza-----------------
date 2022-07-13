<?
//ДЕЛАЕМ ТУТ ЗАКАЗ С ИСПОЛЬЗОВАНИЕМ КЛАССОВ ИЗ classes
require_once('./classes/Pizza.php');
require_once('./classes/FinalPrice.php');

print_r($_POST);
//сюда приходит AJAX запрос с данными формы
// делаем пиццу new AnyPizza()
// метод от AnyPizza возвращает цены на пиццу, размер и соус(ы)