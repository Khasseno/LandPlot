<?php

    session_start();
    require_once '../../../vendor/connect.php';

    $id = $_GET['id'];
    $application = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `landdivide` WHERE `id`='$id'"))
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../css/LandDivide.css">
</head>
<body>
        <div class="line1"></div>    
        <div class="line2"></div>
        <a href="../lists/landDivideList.php">
            <div class="triangle">
        </div></a>
        <div class="text"> Просмотр заявки "Определение делимости и неделимости земельного участка"</div>
        <div class="personInfo">
            <h1>ЗАЯВКА № <?php echo $application['Id']?></h1>
            <p>Сведения о заявителе:</p>
            <div class="person">
                <div class="person-name"><?php echo $application['name']?></div>
                <div class="person-iin"><?php echo $application['iin']?></div>
            </div>
            <div class="home-address"><?php echo $application['address']?></div>
        </div>
        <div class="documents">
            <p>Предоставляемые документы:</p>
            <div class="person-statement">
                <div class="statement">заявление на определение делимости и неделимости земельного участка</div>
                <a href="#" class="pdf-statement">прикрепленный документ</a>
            </div>

            <div class="person-statement">
                <div class="statement">схема раздела земельного участка, с указанием размеров разделяемых частей земельного участка и существующих строений</div>
                <a href="#" class="pdf-statement">прикрепленный документ</a>
            </div>

            <div class="person-statement">
                <div class="statement">копия идентификационного документа на земельный участок</div>
                <a href="#" class="pdf-statement">прикрепленный документ</a>
            </div>
        </div>
        <div class="buttons">
            <a href="#" class="yes">отправить на согласование</a>
            <a href="#" class="no">отклонить</a>
        </div>
</body>
