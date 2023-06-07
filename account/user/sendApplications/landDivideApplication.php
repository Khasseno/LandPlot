<?php

    session_start();

    require_once '../../../vendor/connect.php';

    if($_SESSION['status'] != "user") header("Location: authorization.php");

    $iin = $_SESSION['iin'];
    $data = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `accounts` WHERE `iin`='$iin'"));

    $nameArr = explode(' ', $data['name']);
    $surname = $nameArr[0];
    $name = $nameArr[1];
    $patronymic = count($nameArr) > 2 ? $nameArr[2] : ' ';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../css/account/user/sendApplications/landDivideApplication.css">
</head>
<body>
    <div class="line1"></div>    
    <div class="line2"></div>
    <a href="../service.php">
        <div class="triangle">
    </div></a>
    <div class="text">Определение делимости и неделимости земельного участка</div>
    <form action="" class="info" method="post" id="landDivideApplicationForm">
        <div class="input-container">
            <div class="personalData">
                <ul>
                    <p class="data">Личные данные</p>
    
                    <li class="iin">
                        <input value="<?php echo $data['iin'];?>" pattern="[0-9]{12}" max="12" name="iin" form="landDivideApplicationForm" type="text" placeholder="Введите ИИН" required>
                    </li>
    
                    <li class="surname">
                        <input value="<?php echo $surname;?>" name="surname" form="landDivideApplicationForm" type="text" placeholder="Введите фамилию" required>
                    </li>
    
                    <li class="name">
                        <input value="<?php echo $name;?>" name="name" form="landDivideApplicationForm" type="text" placeholder="Введите имя" required>
                    </li>
    
                    <li class="patronymic">
                        <input value="<?php echo $patronymic;?>" name="patronymic" form="landDivideApplicationForm" type="text" placeholder="Введите отчество" required>
                    </li>
    
                    <li class="id-number">
                        <input value="<?php echo $data['certificateId'];?>"pattern="[0-9]{9}" max="9" name="id-number" form="landDivideApplicationForm" type="text" placeholder="Введите № удостоверения личности" required>
                    </li>
                </ul>
            </div>
    
            <div class="address">
                <ul>
                    <p class="addressData">Данные по прописке</p>
    
                    <li class="region">
                        <input value="<?php echo $data['region'];?>" name="region" form="landDivideApplicationForm" type="text" placeholder="Введите область" required>
                    </li>
    
                    <li class="city">
                        <input value="<?php echo $data['city'];?>" name="city" form="landDivideApplicationForm" type="text" placeholder="Введите город/село" required>
                    </li>

                    <li class="district">
                        <input value="<?php echo $data['district'];?>" name="district" form="landDivideApplicationForm" type="text" placeholder="Введите район" required>
                    </li>
    
                    <li class="street">
                        <input value="<?php echo $data['address'];?>" name="address" form="landDivideApplicationForm" type="text" placeholder="Введите улицу, дом, квартиру" required>
                    </li>
                </ul>
            </div>
        </div>
        <button form="landDivideApplicationForm" type="submit" class="next">ДАЛЕЕ</button>
    </form>

    <script>
        form = document.getElementById('landDivideApplicationForm');
        form.addEventListener('submit', formSend);

        async function formSend(e) {
            e.preventDefault();

            formData = new FormData(form);
            let response = await fetch('../../../vendor/firstFormSave/firstFormLandDivideSave.php', {
                method: 'POST',
                body: formData
            })
            document.location = 'landDivideApplicationNext.php';
        }
    </script>
</body>
</html>
