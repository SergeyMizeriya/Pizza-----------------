<?
require_once('./connect.php');

$queryAllPizzaSauces = "SELECT * FROM `pizza_sauce`";
$allPizzaSaucesQuery = mysqli_query($connect, $queryAllPizzaSauces);
//$allPizzaTypes = mysqli_fetch_assoc($allPizzaTypes);
while ($allPizzaSauces = mysqli_fetch_assoc($allPizzaSaucesQuery)) {

    echo '<li><a href="#">
            <label for="' . $allPizzaSauces['id'] . '">' . $allPizzaSauces['sauce'] . '</label>
                <input type="checkbox" id="' . $allPizzaSauces['id'] . '" name="interest" value="' . $allPizzaSauces['sauce'] . '">
               </a>
            </li>';
}
