<?
require_once('./connect.php');

$queryAllPizzaTypes = "SELECT * FROM `pizza_type`";
$allPizzaTypesQuery = mysqli_query($connect, $queryAllPizzaTypes);
//$allPizzaTypes = mysqli_fetch_assoc($allPizzaTypes);
while ($allPizzaTypes = mysqli_fetch_assoc($allPizzaTypesQuery)) {

    echo '<li><a href="#">
            <label for="' . $allPizzaTypes['id'] . '">' . $allPizzaTypes['type'] . '</label>
                <input type="checkbox" id="' . $allPizzaTypes['id'] . '" name="interest" value="' . $allPizzaTypes['type'] . '">
               </a>
            </li>';
}
