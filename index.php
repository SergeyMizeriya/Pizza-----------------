<?php
//ПОДЛКЮЧЕНИЕ ДАННЫХ О КУРСЕ ВАЛЮТ
$data = file_get_contents('https://www.nbrb.by/api/exrates/rates/431');
$courses = json_decode($data, true);
//$courses['Cur_OfficialRate'];
?>

<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <title>Pizza</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <nav>
        <h1>Pizza Menu</h1>
        <form>
            <ul class="main">
                <li>
                    <a href="#">Пицца</a>
                    <ul class="sub">
                        <?php require_once('templates/pizza-list.php'); ?>

                    </ul>
                </li>
                <li>
                    <a href="#">Размер</a>
                    <ul class="sub">
                        <?php require_once('templates/size-list.php'); ?>

                    </ul>
                </li>
                <li>
                    <a href="#">Соус</a>
                    <ul class="sub">
                        <?php require_once('templates/sauce-list.php'); ?>

                    </ul>
                </li>

            </ul>
            <input class="submit-button" type="submit" value="Заказать">

        </form>

    </nav>
    <h2 class="cheque">Стоимость: <span id="cost"></span> BYN (<span id="cost-in-USD"></span> USD)</h2>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        $(function() {
            $(".main li").hover(
                function() {
                    //$('ul.sub', this).slideDown(500);
                    //$('>ul.sub', this).slideDown(500);
                    $('>ul.sub:not(:animated)', this).slideDown(500);
                },
                function() {
                    //$('ul.sub',this).slideUp(300);
                    $('>ul.sub', this).slideUp(300);
                }
            );
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'order/order.php',
                    data: $(this).serialize(),
                    success: function(data) {
                        alert("Заказ посчитан!");
                        $('#cost').text(data);
                        $('#cost-in-USD').text((data / <?php echo $courses['Cur_OfficialRate'] ?>).toFixed(2));
                    }
                });
            });
        });
    </script>
</body>

</html>
</body>
<!-- <script src="script.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

</html>