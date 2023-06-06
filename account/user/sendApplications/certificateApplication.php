<?php
session_start();

if($_SESSION['status'] != "user") header("Location: authorization.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../css/account/user/sendApplications/certificateApplication.css">
</head>
<body>
    <div class="line1"></div>    
    <div class="line2"></div>
    <a href="../service.php">
        <div class="triangle">
    </div></a>
    <div class="text">Выдача жилищных сертификатов</div>
    <form action="certificateApplicationNext.php" class="info" method="post">
        <div class="input-container">
            <div class="personalData">
                <ul>
                    <p class="data">Личные данные</p>
    
                    <li class="iin">
                        <input type="text" name="iin" placeholder="Введите ИИН" minlength=12 maxlength=12 requried>
                    </li>
    
                    <li class="surname">
                        <input type="text" name="surname" placeholder="Введите фамилию">
                    </li>
    
                    <li class="name">
                        <input type="text" name="name" placeholder="Введите имя">
                    </li>
    
                    <li class="patronymic">
                        <input type="text" name="patronymic" placeholder="Введите отчество">
                    </li>
    
                    <li class="id-number">
                        <input type="number" name="id-number" placeholder="Введите № удостоверения личности">
                    </li>
    
                    <p class="family">Сведения о семье</p>
    
                    <li class="marriage-number">
                        <input type="number" name="marriage-number" placeholder="Введите № свидетельства о заключени брака">
                    </li>
    
                    <li class="spouse">
                        <input type="text" name="spouse" placeholder="Введите ФИО супруг(а)">
                    </li>
    
                    <li class="spouse-iin">
                        <input type="number" name="spouse-iin" placeholder="Введите ИИН супруг(а)">
                    </li>
                </ul>
            </div>
            
            <div class="address">
                <ul>
                    <li class="amount-of-children">
                        <input id="amount-of-children" type="number" name="amount-of-children" placeholder="Введите количество детей">
                    </li>
                </ul>
                
                <div class="child">
                    <ul id="child">
                    </ul>
                </div>
    
                <div class="child-iin">
                    <ul id="child-iin">
                    </ul>
                </div>
                <ul>
                    <p class="family">Данные по прописке</p>
    
                    <li class="region">
                        <input type="text" name="region" placeholder="Введите область">
                    </li>
    
                    <li class="district">
                        <input type="text" name="district" placeholder="Введите район">
                    </li>
    
                    <li class="city">
                        <input type="text" name="city" placeholder="Введите город/село">
                    </li>
    
                    <li class="street">
                        <input type="text" name="street" placeholder="Введите улицу, дом, квартиру">
                    </li>
                </ul>
    
            </div>  
        </div>
        <a href="certificateApplicationNext.php">
        <button type="button" class="next">ДАЛЕЕ</button>
</a>
    </form>

   <script src="../../../script/applications.js"></script>
</body>
</html>
