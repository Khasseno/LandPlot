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
    <link rel="stylesheet" href="../../../css/account/user/sendApplications/LandDivideApplicationNext.css"> 
    <title>Определение делимости и неделимости земельного участка</title> 
</head> 
<body>
     <div class="line1"></div>
     <div class="line2"></div>
     <a href="LandDivideApplication.php"><div class="triangle"></div></a>
     <div class="title">Определение делимости и неделимости земельного участка</div>

     <div class="container-max">
        <div class="container">

          <div class="words">заявление на определение делимости и неделимости земельного участка</div>
          <label for="pin-doc">
            <!-- <span class="pin-text">Прикрепить документ</span> -->
            <input type="file" name="mainApplication" id="pin-doc">
          </label>

          <div class="words">схема раздела земельного участка с указанием размеров разделяемых частей земельного участка и существующих строений</div>
          <label for="pin-doc">
            <!-- <span class="pin-text">Прикрепить документ</span> -->
            <input type="file" name="identifyDoc" id="pin-doc">
          </label>
          
          <div class="words">копия идентификационного документа на земельной участок</div>
          <label for="pin-doc">
            <!-- <span class="pin-text">Прикрепить документ</span> -->
            <input type="file" name="incomeStatement" id="pin-doc">
          </label>
        </div>

        <button class="send">отправить заявку</button>
      </div>

      <script>
        var inputs = Array.from(document.querySelectorAll('#pin-doc'));
        
        inputs.forEach(input => {
          input.onchange = (e) => {
            var { value } = e.target;
            input.style.color = '#36c549';
          };
        })
      </script>
</body>
</html>