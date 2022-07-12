<?
require_once('./connect.php');

$queryAllPizzaSizes = "SELECT * FROM `pizza_size`";
$allPizzaSizesQuery = mysqli_query($connect, $queryAllPizzaSizes);
//$allPizzaTypes = mysqli_fetch_assoc($allPizzaTypes);
while ($allPizzaSizes = mysqli_fetch_assoc($allPizzaSizesQuery)) {

    echo '<li><a href="#">
            <label for="' . $allPizzaSizes['id'] . '">' . $allPizzaSizes['size'] . ' см</label>
                <input type="checkbox" id="' . $allPizzaSizes['id'] . '" name="interest" value="' . $allPizzaSizes['size'] . '">
               </a>
            </li>';
}
