<?
require_once('./connect.php');

// СОЗДАНИЕ ШАБЛОНА ДЛЯ ВЫВОДА ВЕРСТКИ ВСЕХ РАЗМЕРОВ ПИЦЦЫ
$queryAllPizzaSizes = "SELECT * FROM `pizza_size`";
$allPizzaSizesQuery = mysqli_query($connect, $queryAllPizzaSizes);
while ($allPizzaSizes = mysqli_fetch_assoc($allPizzaSizesQuery)) {

    echo '<li><a href="#">
            <label for="size' . $allPizzaSizes['id'] . '">' . $allPizzaSizes['size'] . ' см</label>
                <input type="radio" id="size' . $allPizzaSizes['id'] . '" name="size" value="' . $allPizzaSizes['size'] . '">
               </a>
            </li>';
}
