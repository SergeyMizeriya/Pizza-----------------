<?
require_once('./connect.php');

// СОЗДАНИЕ ШАБЛОНА ДЛЯ ВЫВОДА ВЕРСТКИ ВСЕХ СОУСОВ ДЛЯ ПИЦЦЫ
$queryAllPizzaSauces = "SELECT * FROM `pizza_sauce`";
$allPizzaSaucesQuery = mysqli_query($connect, $queryAllPizzaSauces);
while ($allPizzaSauces = mysqli_fetch_assoc($allPizzaSaucesQuery)) {

    echo '<li><a href="#">
            <label for="sauce' . $allPizzaSauces['id'] . '">' . $allPizzaSauces['sauce'] . '</label>
                <input type="radio" id="sauce' . $allPizzaSauces['id'] . '" name="sauce" value="' . $allPizzaSauces['sauce-input-name'] . '">
               </a>
            </li>';
}
