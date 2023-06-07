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
    <link rel="stylesheet" href="../../../css/account/user/sendApplications/landDivideApplicationNext.css">
</head>
<body>  
    <div class="line1"></div>
     <div class="line2"></div>
     <a href="landDivideApplication.php"><div class="triangle"></div></a>
     <div class="title">Определение делимости и неделимости земельного участка</div>

    <form action="../../../vendor/sendApplication/sendLandDivideApplication.php" method="POST" enctype="multipart/form-data" class="container-max">
        
        <div class="container">

          <div class="words">Заявление на определение делимости и неделимости земельного участка</div>
          <label for="pin-doc">
            <input type="file" name="landDivideApplication" id="pin-doc" accept="application/pdf" required>
          </label>

          <div class="words">Схема раздела земельного участка с указанием размеров разделяемых частей земельного участка и существующих строений</div>
          <label for="pin-doc">
            <input type="file" name="scheme" id="pin-doc" accept="application/pdf" required>
          </label>
          
          <div class="words">Копия идентификационного документа на земельный участок</div>
          <label for="pin-doc">
            <input type="file" name="idCopy" id="pin-doc" accept="application/pdf" required>
          </label>

        </div>

        <button type="submit" class="send">отправить заявку</button>
    </form>

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
