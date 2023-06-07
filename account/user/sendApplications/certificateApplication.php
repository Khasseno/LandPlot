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
    <link rel="stylesheet" href="../../../css/account/user/sendApplications/certificateApplication.css">
</head>
<body>
    <div class="line1"></div>    
    <div class="line2"></div>
    <a href="../service.php">
        <div class="triangle">
    </div></a>
    <div class="text">Выдача жилищных сертификатов</div>
    <form action="" class="info" method="post" id="certificateApplicationForm">
        <div class="input-container">
            <div class="personalData">
                <ul>
                    <p class="data">Личные данные</p>
    
                    <li class="iin">
                        <input value="<?php echo $data['iin'];?>" pattern="[0-9]{12}" form="certificateApplicationForm" type="text" name="iin" placeholder="Введите ИИН" maxlength="12" required>
                    </li>
    
                    <li class="surname">
                        <input value="<?php echo $name;?>" form="certificateApplicationForm" type="text" name="surname" placeholder="Введите фамилию" maxlength="255" required>
                    </li>
    
                    <li class="name">
                        <input value="<?php echo $surname;?>" form="certificateApplicationForm" type="text" name="name" placeholder="Введите имя" maxlength="255" required>
                    </li>
    
                    <li class="patronymic">
                        <input value="<?php echo $patronymic;?>" form="certificateApplicationForm" type="text" name="patronymic" placeholder="Введите отчество" maxlength="255" required>
                    </li>
    
                    <li class="id-number">
                        <input value="<?php echo $data['certificateId'];?>" pattern="[0-9]{9}" form="certificateApplicationForm" type="text" name="id-number" placeholder="Введите № удостоверения личности" maxlength="9" required>
                    </li>
    
                    <p class="family">Сведения о семье</p>
    
                    <li class="marriage-number">
                        <input pattern="[0-9]{7}" form="certificateApplicationForm" type="text" name="marriage-number" placeholder="Введите № свидетельства о заключени брака" maxlength="7" required>
                    </li>
    
                    <li class="spouse">
                        <input form="certificateApplicationForm" type="text" name="spouse" placeholder="Введите ФИО супруг(а)" maxlength="255" required>
                    </li>
    
                    <li class="spouse-iin">
                        <input pattern="[0-9]{12}" form="certificateApplicationForm" type="text" name="spouse-iin" placeholder="Введите ИИН супруг(а)" maxlength="12" required>
                    </li>
                </ul>
            </div>
            
            <div class="address">
                <ul>
                    <li class="amount-of-children">
                        <input form="certificateApplicationForm" id="amount-of-children" type="number" name="amount-of-children" placeholder="Введите количество детей" max="100" required>
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
                        <input value="<?php echo $data['region'];?>" form="certificateApplicationForm" type="text" name="region" placeholder="Введите область" maxlength="255" required>
                    </li>
    
                    <li class="city">
                        <input value="<?php echo $data['city'];?>" form="certificateApplicationForm" type="text" name="city" placeholder="Введите город/село" maxlength="255" required>
                    </li>

                    <li class="district">
                        <input value="<?php echo $data['district'];?>" form="certificateApplicationForm" type="text" name="district" placeholder="Введите район" maxlength="255" required>
                    </li>
    
                    <li class="street">
                        <input value="<?php echo $data['address'];?>" form="certificateApplicationForm" type="text" name="street" placeholder="Введите улицу, дом, квартиру" maxlength="255" required>
                    </li>
                </ul>
            </div>  
        </div>
        <button form="certificateApplicationForm" type="submit" class="next" id="next-btn">ДАЛЕЕ</button>
    </form>

    <script>
        ulChild = document.getElementById('child');
        ulChildIIN = document.getElementById('child-iin');

        const input = document.getElementById('amount-of-children');
        input.onchange = (e) => {
            const { value } = e.target;
            removeChilds('child');
            removeChilds('child-iin');

            addChild(value);
        };

        function removeChilds(elementId) {
            while (document.getElementById(elementId).children.length > 0) {
                document.getElementById(elementId).removeChild(document.getElementById(elementId).children[0]);
            }
        }

        function addChild(value) {
            for (i = 0; i < value; i++) {
                // Создаём элементы для списка child
                newChildLi = document.createElement('li');
                newChildInput = document.createElement('input');

                // Создаём элементы для списка child-iin
                newChildIINLi = document.createElement('li');
                newChildIINInput = document.createElement('input');

                // Выставляем input из списка child необходмымые аттрибуты
                setChildInputAttributes(newChildInput, i + 1);

                // Выставляем input из списка child-iin необходмымые аттрибуты
                setChildIINInputAttributes(newChildIINInput, i + 1);

                // Закидываем input в один из пунктов списка child
                newChildLi.appendChild(newChildInput);

                // Закидываем input в один из пунктов списка child-iin
                newChildIINLi.appendChild(newChildIINInput);

                // Закидываем пункт списка в список child
                ulChild.appendChild(newChildLi);

                // Закидываем пункт списка в список child-iin
                ulChildIIN.appendChild(newChildIINLi);
            }
        }

        function setChildIINInputAttributes(input, id) {
            input.setAttribute('type', 'text');
            input.setAttribute('class', 'child-info');
            input.setAttribute('name', 'child-iin-' + (id));
            input.setAttribute('placeholder', 'ИИН ребёнка ' + id);
            input.setAttribute('form', 'certificateApplicationForm');
            input.setAttribute('maxlength', '12');
            input.setAttribute('requried', '');
        }

        function setChildInputAttributes(input, id) {
            input.setAttribute('type', 'text');
            input.setAttribute('class', 'child-info');
            input.setAttribute('name', 'child-name-' + (id));
            input.setAttribute('placeholder', 'ФИО ребёнка ' + id);
            input.setAttribute('form', 'certificateApplicationForm');
            input.setAttribute('maxlength', '255');
            input.setAttribute('requried', '');
        }
    </script>

    <script>
        form = document.getElementById('certificateApplicationForm');
        form.addEventListener('submit', formSend);

        function formAreFilled() {
            check = true;
            requiredInputs = document.querySelectorAll('.child-info');
            requiredInputs.forEach((input) => {
                if (input.value === '') {
                    check = false;
                }
            })
            return check;
        }

        async function formSend(e) {
            e.preventDefault();

            if (formAreFilled()) {
                formData = new FormData(form);
                let response = await fetch('../../../vendor/firstFormsSave/firstFormCertificateSave.php', {
                    method: 'POST',
                    body: formData
                });
                document.location = 'certificateApplicationNext.php';

            } else {
                alert("Заполните все поля");
            }
        }
    </script>
</body>
</html>
