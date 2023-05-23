<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Land Plot</title>
</head>

<body>
    <div class="wrapper">
        <h1>Заполнение заявки</h1>
        <form action="vendor/send.php" method="post">
            <input type="text" name="IIN" placeholder="ИИН" require>
            <br>
            <input type="text" name="area" placeholder="Площадь" require>
            <br>
            <input type="text" name="landAddress" placeholder="Адрес участка" require>
            <br>
            <input type="text" name="specialPurpose" placeholder="Целевое назначение" require>
            <br>
            <input type="text" name="partitionPurpose" placeholder="Цель раздела" require>
            <br>
            <button type="submit"> Отправить </button>
    
            <?php
                if ($_SESSION['SUCCESS'])
                {
                    echo '<p class="success">' . $_SESSION['SUCCESS'] . '</p>';
                    unset($_SESSION['SUCCESS']);
                }
            ?>
        </form>
    </div>
</body>

</html>