<?php

    session_start();
    iinOfPerson = $_POST['name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../css/landDivideApplication.css">
</head>
<body>
    <div class="line1"></div>    
    <div class="line2"></div>
    <a href="service.php">
        <div class="triangle">
    </div></a>
    <div class="text">Определение делимости и неделимости земельного участка</div>
    <form action="" class="info" method="post">
        <div class="input-container">
            <div class="personalData">
                <ul>
                    <p class="data">Личные данные</p>
    
                    <li class="iin">
                        <input type="number" placeholder="Введите ИИН">
                    </li>
    
                    <li class="surname">
                        <input type="text" placeholder="Введите фамилию">
                    </li>
    
                    <li class="name">
                        <input type="text" placeholder="Введите имя">
                    </li>
    
                    <li class="patronymic">
                        <input type="text" placeholder="Введите отчество">
                    </li>
    
                    <li class="id-number">
                        <input type="number" placeholder="Введите № удостоверения личности">
                    </li>
                </ul>
            </div>
    
            <div class="address">
                <ul>
                    <p class="addressData">Данные по прописке</p>
    
                    <li class="region">
                        <input type="text" placeholder="Введите область">
                    </li>
    
                    <li class="district">
                        <input type="text" placeholder="Введите район">
                    </li>
    
                    <li class="city">
                        <input type="text" placeholder="Введите город/село">
                    </li>
    
                    <li class="street">
                        <input type="text" placeholder="Введите улицу, дом, квартиру">
                    </li>
                </ul>
            </div>
        </div>
        <button type="button" class="next">ДАЛЕЕ</button>
    </form>

    <script src="../../script/applications.js"></script>
</body>
</html>
