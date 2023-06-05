<!DOCTYPE html> 
<html lang="en"> 
 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="../../../css/pinDocuments.css"> 
    <title>Выдача жилищных сертификатов</title> 
</head> 
<body>
     <div class="line1"></div>
     <div class="line2"></div>
     <a href="certificateApplication.php"><div class="triangle"></div></a>
     <div class="title">Выдача жилищных сертификатов</div>

     <div class="container-max">
        <div class="container">

          <div class="words">заявление на предоставление жилищного сертификата</div>
          <label for="pin-doc">
            <!-- <span class="pin-text">Прикрепить документ</span> -->
            <input type="file" name="mainApplication" id="pin-doc">
          </label>

          <div class="words">документ,удостоверяющий личность заявителя и членов семьи(супруг(а), несовершеннолетних детей)(для идентификации личности) </div>
          <label for="pin-doc">
            <!-- <span class="pin-text">Прикрепить документ</span> -->
            <input type="file" name="identifyDoc" id="pin-doc">
          </label>
          
          <div class="words">справка о доходах за последнии шесть месяцев по трудовой и (или) предпренимательской деятельности(на всех членов семьи)</div>
          <label for="pin-doc">
            <!-- <span class="pin-text">Прикрепить документ</span> -->
            <input type="file" name="incomeStatement" id="pin-doc">
          </label>

          <div class="words">справка с места работы,за исключением социально-уязвимых слоев население</div>
          <label for="pin-doc">
            <!-- <span class="pin-text">Прикрепить документ</span> -->
            <input type="file" name="workStatement" id="pin-doc">
          </label>
            
          <div class="words">письмо БВУ об одобрении выдачи ипотечного займа на приобретении жилья заявителю,содержащее сведения о сумме,размере о первоначального взноса и сумме ежемесячного платежа по ипотечному жилищному займу</div>
          <label for="pin-doc">
            <!-- <span class="pin-text">Прикрепить документ</span> -->
            <input type="file" name="STBMassage" id="pin-doc">
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
