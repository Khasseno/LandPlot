<?php
    $connect = mysqli_connect('localhost', 'root', 'root', 'landplot');

    if (!$connect)
    {
        die('Ошибка подключения к базе данных');
    }

?>