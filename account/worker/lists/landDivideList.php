<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../css/applicationList.css">
</head>
<body>
        <div class="line1"></div>    
        <div class="line2"></div>
        <a href="#"><div class="triangle"></div></a>
        <div class="text">Определение делимости и неделимости земельного участка</div>
        <ul class="list">
            <?php
            if(mysqli_num_rows($applications) > 0){
                while($value = mysqli_fetch_array($applications)){
                    echo '<li class="application">
                    <div class="fio"><h4>'.$value['name'].'</h4></div>
                    <div class="number"><h4>№'.$value['id'].'</h4></div>
                    <a href="#"><div class="view"><h4>просмотр</h4></div></a>
                    </li>'; 
                }
            }
            ?>
        </ul>        
</body>
</html>
