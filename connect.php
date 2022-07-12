<?
$connect = mysqli_connect('localhost', 'root', '', 'pizza_bd');
// $connect_users = mysqli_connect('localhost', 'root', '', 'test');

if (!$connect) {
    die('Не удалось подключиться к базе данных.');
}
