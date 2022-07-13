<?
require_once('./connect.php');

$queryAllPizzaTypes = "SELECT * FROM `pizza_type`";
$allPizzaTypesQuery = mysqli_query($connect, $queryAllPizzaTypes);
//$allPizzaTypes = mysqli_fetch_assoc($allPizzaTypes);
while ($allPizzaTypes = mysqli_fetch_assoc($allPizzaTypesQuery)) {

    echo '<li><a href="#">
            <label for="pizza' . $allPizzaTypes['id'] . '">' . $allPizzaTypes['type'] . '</label>
                <input type="radio" id="pizza' . $allPizzaTypes['id'] . '" name="interest" value="' . $allPizzaTypes['type'] . '">
               </a>
            </li>';
}
