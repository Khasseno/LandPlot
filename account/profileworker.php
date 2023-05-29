<?php
session_start();
require_once '../vendor/connect.php';

if($_SESSION['status'] != "worker") header("Location: authorization.php");

$iin = $_SESSION['iin'];
$name = mysqli_fetch_assoc(mysqli_query($connect, "SELECT `name` FROM `accounts` WHERE `iin`='$iin'"))['name'];

$landdivide = mysqli_query($connect, "SELECT * FROM `landdivide`");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profileworker.css">
    <title>
        <?php
        echo $name;
        ?>
    </title>
</head>

<body>
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

    <p class="applications"> ЗАЯВКИ </p>
    <div class="wrapper">
        <div>
            <div class="board">
                Определение делимости и неделимости земельного участка
            </div>
            <div class="score">
                <?php echo mysqli_num_rows($landdivide); ?>
            </div>
        </div>
        <div>
            <div class="board">
                Выдача жилищных сертификатов
            </div>
            <div class="score">
                0
            </div>
        </div>
    </div>
    <div class="vertical-1"></div>
    <div class="vertical-2"></div>
    <script type="text/javascript" src="../script/profile.js"></script>
</body>

</html>