<?php

    session_start();
    require_once '../../../vendor/connect.php';

    if($_SESSION['status'] != "worker") header("Location: authorization.php");

    $id = mysqli_real_escape_string($connect, htmlspecialchars($_GET['id']));
    $application = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `certificate` WHERE `id`='$id'"));

    $childrenNames = explode(';', $application['childrenNames']);
    $childrenIINs = explode(';', $application['childrenIINs']);

    $fullAddress = $application['region'].', '.$application['city'].', '.$application['district'].', '.$application['address'];
    
    if(count($childrenNames) == 1 && $childrenNames[0] == "") {
        $childrenNames = [];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Просмотр</title>
    <link rel="stylesheet" href="../../../css/account/worker/applications/certificate.css">
</head>

<body>
    <div class="line1"></div>
    <div class="line2"></div>
    <a href="../lists/certificates.php">
        <div class="triangle"></div>
    </a>
    <div class="text"> Просмотр заявки "Выдача жилищный сертификатов"</div>

    <div class="personInfo">
        <h1 id="applicationId">ЗАЯВКА № <?php echo $id ?></h1>
        <p>Сведения о заявителе:</p>
        <div class="person">
            <div class="person-name"><?php echo $application['applicantName']?></div>
            <div class="person-iin"><?php echo $application['applicantIIN']?></div>
        </div>

        <div class="spouse">
            <div class="spouse-name"><?php echo $application['spouseName']?></div>
            <div class="spouse-iin"><?php echo $application['spouseIIN']?></div>
        </div>

        <ul class="children">
            <?php 
                if(count($childrenNames) != 0) {
                    for ($i = 0; $i < count($childrenNames); $i++) {
                        echo '<li class="child">
                                <div class="child-name">'.$childrenNames[$i].'</div>
                                <div class="child-iin">'.$childrenIINs[$i].'</div>
                              </li>';
                    }
                } else {
                    echo '<p style="text-align:center; opacity: 0.8;">Отсутствуют</p>';
                }
            ?>
        </ul>
    </div>

    <div class="documents">
        <p>Предоставляемые документы:</p>
        <div class="person-statement">
            <div class="statement">заявление на предоставление жилищного сертификата</div>
            <a href="<?php echo '../../../documents/usersApplications/'.$application['mainApplication']?>" class="pdf-statement">прикрепленный документ</a>
        </div>

        <div class="person-statement">
            <div class="statement">схема раздела земельного участка, с указанием размеров разделяемых частей земельного
                участка</div>
            <a href="<?php echo '../../../documents/usersApplications/'.$application['identifyDoc']?>" class="pdf-statement">прикрепленный документ</a>
        </div>

        <div class="person-statement">
            <div class="statement">справка о доходах за последние шесть месяцев по трудовой и (или) предпринимательской
                деятельности (на всех членов семьи)</div>
            <a href="<?php echo '../../../documents/usersApplications/'.$application['incomeStatement']?>" class="pdf-statement">прикрепленный документ</a>
        </div>

        <div class="person-statement">
            <div class="statement">справка с места работы, за исключением социально-уязвимых слоев населения</div>
            <a href="<?php echo '../../../documents/usersApplications/'.$application['workStatement']?>" class="pdf-statement">прикрепленный документ</a>
        </div>

        <div class="person-statement">
            <div class="statement">письмо БВУ об одобрении выдачи ипотечного займа при приобретении жилья заявителю
            </div>
            <a href="<?php echo '../../../documents/usersApplications/'.$application['STBMassage']?>" class="pdf-statement">прикрепленный документ</a>
        </div>
    </div>

    <div class="buttons">
        <div id="accept" onclick="acceptApplication('certificate')" class="yes">отправить на согласование</div>
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
                        <input name="applicationName" type="text" value="certificate" style="display: none;">
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
