<?php
    session_start();
    require_once '../vendor/connect.php';

    $Login = $_SESSION['name'];
    $applications = mysqli_query($connect, "SELECT `id` FROM `application` WHERE `Login`='$Login'")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profileuser.css">
    <title>
        Профиль
    </title>
</head>

<body>
    <header>
        <ul>
            <li class="fullname"> Хасенов Алтай Елтайулы
                <a onclick="toggleDropDown()">
                    <svg version="1.1" width="20px" height="20px" id="menu__button">
                        <polygon fill="#b5cfc2" points="0,20 10,0 20,20" />
                    </svg>
                </a>
            </li>
        </ul>
    </header>
    <nav>
        <ul class="menu" id="menu" style="display: inline;">
            <a>
                <li> Услуги </li>
            </a>
            <a>
                <li> Выход </li>
            </a>
        </ul>
    </nav>

    <div class="wrapper">
        <p class="applications"> Заявки </p>
    </div>

    <script type="text/javascript" src="../script/profile.js"></script>
</body>

</html>
