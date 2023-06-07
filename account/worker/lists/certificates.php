<?php
    session_start();
    require_once '../../../vendor/connect.php';

    if($_SESSION['status'] != "worker") header("Location: authorization.php");

    $applications = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `certificate` WHERE `status`='sent'"), MYSQLI_ASSOC)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../css/account/worker/lists/applicationList.css">
</head>
<body>
        <div class="line1"></div>    
        <div class="line2"></div>
        <a href="#"><div class="triangle"></div></a>
        <div class="text">Выдача жилищных сертификатов</div>
        <ul class="list">
        <?php
            if (count($applications) > 0) {
                foreach ($applications as $application) {
                    echo '<li class="application">
                        <div class="fio"><h4>'.$application['applicantName'].'</h4></div>
                        <div class="number"><h4>№'.$application['id'].'</h4></div>
                        <a href="../applications/certificate.php?id='.$application['id'].'"><div class="view"><h4>просмотр</h4></div></a>
                        </li>';
                }
            }
            ?>
        </ul>  
</body>
</html>
