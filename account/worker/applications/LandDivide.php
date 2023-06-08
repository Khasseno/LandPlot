<?php

    session_start();
    require_once '../../../vendor/connect.php';

    if($_SESSION['status'] != "worker") header("Location: authorization.php");

    $id = mysqli_real_escape_string($connect, htmlspecialchars($_GET['id']));
    $application = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `landdivide` WHERE `id`='$id'"));

    if ($application['status'] !== "sent") header('Location: ../lists/landDivideList.php');
    
    $fullAddress = $application['region'].', '.$application['city'].', '.$application['district'].', '.$application['address'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../css/account/worker/applications/LandDivide.css">
</head>
<body>
    <div class="line1"></div>    
    <div class="line2"></div>
    <a href="../lists/landDivideList.php">
        <div class="triangle"></div>
    </a>
    <div class="text"> Просмотр заявки "Определение делимости и неделимости земельного участка"</div>

    <div class="personInfo">
        <h1 id="applicationId">ЗАЯВКА № <?php echo $application['id']?></h1>
        <p>Сведения о заявителе:</p>
        <div class="person">
            <div class="person-name"><?php echo $application['name']?></div>
            <div class="person-iin"><?php echo $application['iin']?></div>
        </div>
        <div class="home-address"><?php echo $fullAddress?></div>
    </div>
    <div class="documents">
        <p>Предоставляемые документы:</p>
        <div class="person-statement">
            <div class="statement">заявление на определение делимости и неделимости земельного участка</div>
            <a href="<?php echo '../../../documents/usersApplications/'.$application['application']?>" class="pdf-statement">прикрепленный документ</a>
        </div>

        <div class="person-statement">
            <div class="statement">схема раздела земельного участка, с указанием размеров разделяемых частей земельного участка и существующих строений</div>
            <a href="<?php echo '../../../documents/usersApplications/'.$application['scheme']?>" class="pdf-statement">прикрепленный документ</a>
        </div>

        <div class="person-statement">
            <div class="statement">копия идентификационного документа на земельный участок</div>
            <a href="<?php echo '../../../documents/usersApplications/'.$application['copy']?>" class="pdf-statement">прикрепленный документ</a>
        </div>
    </div>

    <div class="buttons">
        <div id="accept" onclick="acceptApplication('landDivide')" class="yes">отправить на согласование</div>
        <div id="openPopup" onclick="openPopup()" class="no">отклонить</div>
    </div>

    <div id="popup" class="popup">
        <div class="popup-body">
            <div class="popup-content">
                <a onclick="closePopup()" class="popup-close">
                    <img src="../../../assets/cross.svg">
                </a>
                <div class="title">Отклонить заявку</div>
                <form action="../../../vendor/denyApplication.php" enctype="multipart/form-data" method="post" class="popup_pin-response">
                    <div class="prompt">прикрепите документ о причине отказа</div>
                    <label class="response-label" for="response">
                        <div class="pin-text">прикрепить документ</div>
                        <input name="id" type="text" value="<?php echo $id?>" style="display: none;">
                        <input name="applicationName" type="text" value="landDivide" style="display: none;">
                        <input id="response" class="input_pin-response" name="response" type="file" accept="application/pdf" required>
                        <div class="pinned-files" id="pinned-files">Файл не выбран</div>
                    </label>
                    <button type="submit" class="send-btn">отправить</button>
                </form>
            </div>
        </div>
    </div>

    <script src="../../../script/acceptApplication.js"></script>
    <script src="../../../script/popup.js"></script>
    <script src="../../../script/pinned-files.js"></script>
</body>
</html>
