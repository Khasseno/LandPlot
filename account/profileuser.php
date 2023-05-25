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
    <link rel="stylesheet" href="../css/profile.css">
    <title>
        Профиль
    </title>
</head>
<body>
    <div class="dropdown" id="dropdown">
      <button id="button" onclick="toggleDropdown()">
        <?php
          echo $_SESSION['name'];
        ?>
        <span id="chevron" class="chevron"></span>
      </button>
      <div id="menu" class="menu">
        <button>
          Услуги
        </button>
        <button>
          Выход
        </button>
      </div>
    </div>
      <div class="notification-container">
        <h3 class="notification-title">Ваши заявления</h3>
        <div class="notification-button full-width">
        <?php
        if (mysqli_num_rows($applications) > 0){
            while($row = mysqli_fetch_assoc($applications)){
                echo '<br>Ваша заявка под №'.$row["id"].' ещё в рассмотрении';
            }
        }else{
            echo "Заявления отсутствуют";
        }
        ?>
        </div>
      </div>
    </body>
    <script type="text/javascript" src="../script/profile.js"></script>
</html>