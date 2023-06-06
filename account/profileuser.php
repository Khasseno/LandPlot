<?php
session_start();
require_once '../vendor/connect.php';

if($_SESSION['status'] != "user") header("Location: authorization.php");

$iin = filter_var(trim($_SESSION['iin']), FILTER_SANITIZE_STRING);

$applications = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `landdivide` WHERE `iin`='$iin' ORDER BY `time` DESC"), MYSQLI_ASSOC);
$name = mysqli_fetch_assoc(mysqli_query($connect, "SELECT `name` FROM `accounts` WHERE `iin`='$iin'"))['name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/account/profileuser.css">
    <title>
    <?php echo $name; ?>
    </title>
</head>

<body>
    <div class="line1"></div>
    <div class="line2"></div>

    <div class="header">
        <span class="fullname"><?php echo $name; ?></span>
        <div class="navigator">
            <button id="menu-btn" class="menu-btn" onClick="toggleDropDown()">
                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" style="fill:#b5cfc2;">
                    <polygon points="0,4 20,4 10,20"></polygon>
                </svg>
            </button>
            <ul id="menu" class="menu">
                <li><a href="user/service.php">УСЛУГИ</a></li>
                <li><a href="authorization.php">ВЫХОД</a></li>
            </ul>
        </div>
    </div>

    <div class="wrapper">
        <p class="application-title">ЗАЯВКИ</p>
        <ul class="application-list">
            <?php
            if(count($applications) > 0){
                foreach ($applications as $application){
                    $present = $application['status'] ==='sent' || $application['status'] ==='accept' ? 
                    '</li>' : '<div class="application-save">скачать</div></li>';
                    echo '<li class="application">
                        <div class="application-name">Заявление на определение делимости или неделимости земельного участкаs</div>
                        <div class="application-status '.$application['status'].'"></div>
                        '.$present;
                    }
                }
            ?>
        </ul>
    </div>

    <script type="text/javascript" src="../script/profile.js"></script>
</body>
</html>