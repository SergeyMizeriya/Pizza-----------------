<?
require_once('./connect.php');

$queryAllPizzaSizes = "SELECT * FROM `pizza_size`";
$allPizzaSizesQuery = mysqli_query($connect, $queryAllPizzaSizes);
//$allPizzaTypes = mysqli_fetch_assoc($allPizzaTypes);
while ($allPizzaSizes = mysqli_fetch_assoc($allPizzaSizesQuery)) {

    echo '<li><a href="#">
            <label for="size' . $allPizzaSizes['id'] . '">' . $allPizzaSizes['size'] . ' см</label>
                <input type="radio" id="size' . $allPizzaSizes['id'] . '" name="size" value="' . $allPizzaSizes['size'] . '">
               </a>
            </li>';
}
