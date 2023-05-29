<?php
    session_start();
    require_once '../vendor/connect.php';

    $Login = $_SESSION['name'];
    $applications = mysqli_query($connect, "SELECT * FROM `application` WHERE `Login`='$Login'")
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
    <div class="lines">
        <div class="line"></div>
        <div class="line2"></div>
    </div>

    <div class="header">
        <span class="fullname">Ким Татьяна Алексеевна</span>
        <div class="navigator">
            <button id="menu-btn" class="menu-btn" onClick="toggleDropDown()">
                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" style="fill:#b5cfc2;">
                    <polygon points="0,4 20,4 10,20"></polygon>
                </svg>
            </button>
            <ul id="menu" class="menu">
                <li><a href="#">УСЛУГИ</a></li>
                <li><a href="#">ВЫХОД</a></li>
            </ul>
        </div>
    </div>

    <div class="wrapper">
        <p class="application-title">ЗАЯВКИ</p>
        <ul class="application-list">
            <li class="application">
                <div class="application-name">Заявление на определение делимости или неделимости земельного участкаs</div>
                <div class="application-status">принято</div>
                <div class="application-save">скачать</div>
            </li>
            <li class="application">
                <div class="application-name">Заявление на определение делимости или неделимости земельного участкаs</div>
                <div class="application-status deny">отказано</div>
                <div class="application-save">скачать</div>
            </li>

            <li class="application">
                <div class="application-name">Заявление на определение делимости или неделимости земельного участкаs</div>
                <div class="application-status success">выдано</div>
                <div class="application-save">скачать</div>
            </li>

            <li class="application">
                <div class="application-name">Заявление на определение делимости или неделимости земельного участкаs</div>
                <div class="application-status">принято</div>
                <div class="application-save">скачать</div>
            </li>

            <li class="application">
                <div class="application-name">Заявление на определение делимости или неделимости земельного участкаs</div>
                <div class="application-status">принято</div>
                <div class="application-save">скачать</div>
            </li>
        </ul>
    </div>

    <script type="text/javascript" src="../script/profile.js"></script>
</body>
</html>
