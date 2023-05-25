<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/authorization.css">
    <title>Авторизация</title>
</head>
<body>
    <div class="wrapper">
    <form action="auth.php" method="post">
        <p class="auth"> Авторизация </p>
        <br>
        <input type="text" name="Login" placeholder="ИИН" require>
        <br>
        <input type="password" name="Pass" placeholder="Пароль" require>
        <br>
        <?php
            if($_SESSION["auth"]){
                echo '<p class="error">'. $_SESSION["auth"].'</p>';
                unset($_SESSION["auth"]);
            }
        ?>
        <button type="submit"> войти </button>
    </form>
    </div>
</body>
</html>