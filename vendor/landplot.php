<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Определение делимости и неделимости земельного участка</title>
</head>

<body>
    <div> <!-- ВОТ ТЕБЕ DIV СВОИ КЛАССЫ МОЖЕШЬ СТАВИТЬ СЮДА -->
        <h1>Определение делимости и неделимости земельного участка</h1>
            <form enctype="multipart/form-data" action="send.php" method="POST">
            заявление на определение делимости и неделимости земельного участка
            <br>
            <div>
                <input type="hidden" name="MAX_FILE_SIZE" value="30000">
                <label for="userfile1">прикрепить документ</label>
                <input id="userfile1" name="application" type="file">
            </div>
            <br>
            схема раздела земельного участка, с указанием размеров разделяемых частей земельного участка и существует строений
            <br>
            <div>
                <input type="hidden" name="MAX_FILE_SIZE" value="30000">
                <label for="userfile2">прикрепить документ</label>
                <input id="userfile2" name="scheme" type="file">
            </div>
            <br>
            копия идентификационного документа на земельный участок
            <br>
            <div>
                <input type="hidden" name="MAX_FILE_SIZE" value="30000">
                <label for="userfile3">прикрепить документ</label>
                <input id="userfile3" name="copy" type="file">
            </div>
            <br>
            <input type="submit" value="отправить заявку">
        </form>
    </div>
    <script src="../script/services.js"></script>
</body>
</html>