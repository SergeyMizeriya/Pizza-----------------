<?php
require('classes/Pizza.php')
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
                        <!-- <li><a href="#">
                                <label for="Пепперони">Пепперони</label>
                                <input type="checkbox" id="Пепперони" name="interest" value="Пепперони">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <label for="country">Деревенская</label>
                                <input type="checkbox" id="country" name="interest" value="Деревенская">
                            </a>
                        </li>
                        <li><a href="#">
                                <label for="hawaii">Гавайская</label>
                                <input type="checkbox" id="hawaii" name="interest" value="Гавайская">
                            </a></li>
                        <li><a href="#">
                                <label for="mushrooms">Грибная</label>
                                <input type="checkbox" id="mushrooms" name="interest" value="Грибная">
                            </a></li> -->
                    </ul>
                </li>
                <li>
                    <a href="#">Размер</a>
                    <ul class="sub">
                        <?php require_once('templates/size-list.php'); ?>

                        <!-- <li><a href="#">
                                <label for="21">21 см</label>
                                <input type="checkbox" id="21" name="interest" value="21"></a></li>
                        <li><a href="#">
                                <label for="26">26 см</label>
                                <input type="checkbox" id="26" name="interest" value="26"></a></li>
                        <li><a href="#">
                                <label for="31">31 см</label>
                                <input type="checkbox" id="31" name="interest" value="31"></a></li>
                        <li><a href="#">
                                <label for="45">45 см</label>
                                <input type="checkbox" id="45" name="interest" value="45"></a></li> -->
                    </ul>
                </li>
                <li>
                    <a href="#">Соус</a>
                    <ul class="sub">
                        <?php require_once('templates/sauce-list.php'); ?>
                        <!-- <li><a href="#">
                                <label for="cheese">Сыырный</label>
                                <input type="checkbox" id="cheese" name="interest" value="Сырный"></a></li>
                        <li><a href="#">
                                <label for="sweet-sour">Кисло-сладкий</label>
                                <input type="checkbox" id="sweet-sour" name="interest" value="Кисло-сладкий"></a>
                            
                        </li>
                        <li><a href="#">
                                <label for="garlic">Чесночный</label>
                                <input type="checkbox" id="garlic" name="interest" value="Чесночный"></a></li>
                        <li><a href="#">
                                <label for="barbecue">Барбекю</label>
                                <input type="checkbox" id="barbecue" name="interest" value="Барбекю"></a></li> -->
                    </ul>
                </li>
                <!-- <li>
                    <a href="#">D</a>
                    <ul class="sub">
                        <li><a href="#">D-1</a></li>
                        <li><a href="#">D-2</a></li>
                        <li><a href="#">D-3</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">E</a>
                    <ul class="sub">
                        <li><a href="#">E-1</a></li>
                        <li><a href="#">E-2</a></li>
                        <li><a href="#">E-3</a></li>
                    </ul>
                </li> -->
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
                        alert("Прибыли данные: " + data);
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