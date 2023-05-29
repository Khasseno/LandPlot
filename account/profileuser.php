<?php
session_start();
require_once '../vendor/connect.php';

if($_SESSION['status'] != "user") header("Location: authorization.php");

$iin = $_SESSION['iin'];
$applications = mysqli_query($connect, "SELECT * FROM `landdivide` ORDER BY `time` DESC");
$name = mysqli_fetch_assoc(mysqli_query($connect, "SELECT `name` FROM `accounts` WHERE `iin`='$iin'"))['name'];

$landdivide = mysqli_query($connect, "SELECT * FROM `landdivide`");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profileuser.css">
    <title>
    <?php echo $name; ?>
    </title>
</head>

<body>
    <div class="lines">
        <div class="line"></div>
        <div class="line2"></div>
    </div>

    <div class="header">
        <span class="fullname"><?php echo $name; ?></span>
        <div class="navigator">
            <button id="menu-btn" class="menu-btn" onClick="toggleDropDown()">
                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" style="fill:#b5cfc2;">
                    <polygon points="0,4 20,4 10,20"></polygon>
                </svg>
            </button>
            <ul id="menu" class="menu">
                <li><a href="#">УСЛУГИ</a></li>
                <li><a href="authorization.php">ВЫХОД</a></li>
            </ul>
        </div>
    </div>

    <div class="wrapper">
        <p class="application-title">ЗАЯВКИ</p>
        <ul class="application-list">
            <?php
            if(mysqli_num_rows($applications) > 0){
                for($i = 0; $i < mysqli_num_rows($applications); $i++){
                    switch(mysqli_fetch_assoc($applications)['status']){
                    case 'sent':
                        echo '<li class="application">
                        <div class="application-name">Заявление на определение делимости или неделимости земельного участкаs</div>
                        <div class="application-status '.mysqli_fetch_assoc($applications)['status'].'">отправлено</div>
                        </li>';
                        break;
                    case 'accepted':
                        echo '<li class="application">
                        <div class="application-name">Заявление на определение делимости или неделимости земельного участкаs</div>
                        <div class="application-status '.mysqli_fetch_assoc($applications)['status'].'">принято</div>
                        </li>';
                        break;
                    case 'success':
                        echo '<li class="application">
                        <div class="application-name">Заявление на определение делимости или неделимости земельного участкаs</div>
                        <div class="application-status '.mysqli_fetch_assoc($applications)['status'].'">выдано</div>
                        <div class="application-save">скачать</div>
                        </li>';
                        break;
                    case 'deny':
                        echo '<li class="application">
                        <div class="application-name">Заявление на определение делимости или неделимости земельного участкаs</div>
                        <div class="application-status '.mysqli_fetch_assoc($applications)['status'].'">отказано</div>
                        <div class="application-save">скачать</div>
                        </li>';
                        break;
                    }
                }
            }?>
        </ul>
    </div>

    <script type="text/javascript" src="../script/profile.js"></script>
</body>
</html>
