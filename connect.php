<?
// СОЕДИНЕНИЕ С БАЗОЙ ДАННЫХ
$connect = mysqli_connect('localhost', 'root', '', 'pizza_bd');

if (!$connect) {
    die('Не удалось подключиться к базе данных.');
}
