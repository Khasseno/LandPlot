<?php
    session_start();
    require_once 'connect.php';
    
    $IIN = filter_var(trim($_POST['IIN']), FILTER_SANITIZE_STRING);
    $area = filter_var(trim($_POST['area']), FILTER_SANITIZE_STRING);
    $landAddress = filter_var(trim($_POST['landAddress']), FILTER_SANITIZE_STRING);
    $specialPurpose = filter_var(trim($_POST['specialPurpose']), FILTER_SANITIZE_STRING);
    $partitionPurpose = filter_var(trim($_POST['partitionPurpose']), FILTER_SANITIZE_STRING);

    mysqli_query($connect, "INSERT INTO `application` (`IIN`, `area`, `landAddress`, `specialPurpose`, `partitionPurpose`) VALUES ('$IIN','$area','$landAddress','$specialPurpose','$partitionPurpose')");

    $_SESSION['SUCCESS'] = "Ваша заявка принята на рассмотрение";

    header('Location: ../index.php');
    exit();    
?>