<?php

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
            <input type="submit">
        </form>
    </nav>

    <h2 class="cheque">Стоимость: <span id="cost"></span> BYN</h2>
    <a href="order/order.php">на страницу order.php</a>
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

    <!-- <script>
        $("form").on("submit", function() {
            $.ajax({
                url: 'order/order.php',
                method: 'post',
                dataType: 'html',
                data: $(this).serialize(),
                success: function(data) {
                    $('#cost').html(data);
                }
            });
        });
    </script> -->
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