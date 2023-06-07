<?php
session_start();
require_once '../vendor/connect.php';

if($_SESSION['status'] != "worker") header("Location: authorization.php");

$iin = $_SESSION['iin'];
$name = mysqli_fetch_assoc(mysqli_query($connect, "SELECT `name` FROM `accounts` WHERE `iin`='$iin'"))['name'];

$landdivide = mysqli_query($connect, "SELECT * FROM `landdivide` WHERE `status`='sent'");
$certificate = mysqli_query($connect, "SELECT * FROM `certificate` WHERE `status`='sent'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/account/profileworker.css">
    <title>
        <?php
            echo $name;
        ?>
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
                <li><a href="authorization.php">ВЫХОД</a></li>
            </ul>
        </div>
    </div>

    <div class="wrapper">
        <p class="application-title"> ЗАЯВКИ </p>
        <ul class="application-list">
            <a href="worker/lists/landDivideList.php">
                <li class="application">
                    <div class="application-name">
                        Определение делимости и неделимости земельного участка
                    </div>
                    <div class="application-status">
                        <?php echo mysqli_num_rows($landdivide); ?>
                    </div>    
                </li>
            </a>

            <a href="worker/lists/certificates.php">
                <li class="application">
                    <div class="application-name">
                        Выдача жилищных сертификатов
                    </div>
                    <div class="application-status">
                        <?php echo mysqli_num_rows($certificate);?>
                    </div>
                </li>
            </a>
        </ul>
    </div>
    <script type="text/javascript" src="../script/profile.js"></script>
</body>

</html>
