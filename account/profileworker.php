<?php
session_start();
require_once '../vendor/connect.php';

$applications = mysqli_query($connect, "SELECT `IIN` FROM `application`")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>
        Профиль
    </title>
</head>
<body>
    <div class="wrapper">
        <?php
        if (mysqli_num_rows($applications) > 0){
            while($row = mysqli_fetch_assoc($applications)){
                echo '<br>Заявка от '.$row["IIN"];
            }
        }else{
            echo "У вас нет уведомлении";
        }
        ?>
    </div>
</body>
</html>
