<?php
    session_start();

    $_SESSION['landDivideFormInfo'] = [
        'iin' => $_POST['iin'],
        'name' => $_POST['surname'].' '.$_POST['name'].' '.$_POST['patronymic'],
        'certificateID' => $_POST['id-number'],
        'region' => $_POST['region'],
        'city' => $_POST['city'],
        'district' => $_POST['district'],
        'address' => $_POST['address'],
    ];

    header('Content-type: application/json');
?>