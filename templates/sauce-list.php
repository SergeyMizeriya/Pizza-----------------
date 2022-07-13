<?
require_once('./connect.php');

$queryAllPizzaSauces = "SELECT * FROM `pizza_sauce`";
$allPizzaSaucesQuery = mysqli_query($connect, $queryAllPizzaSauces);
//$allPizzaTypes = mysqli_fetch_assoc($allPizzaTypes);
while ($allPizzaSauces = mysqli_fetch_assoc($allPizzaSaucesQuery)) {

    echo '<li><a href="#">
            <label for="sauce' . $allPizzaSauces['id'] . '">' . $allPizzaSauces['sauce'] . '</label>
                <input type="checkbox" id="sauce' . $allPizzaSauces['id'] . '" name="' . $allPizzaSauces['sauce-input-name'] . '" value="' . $allPizzaSauces['sauce'] . '">
               </a>
            </li>';
}
