<?php
    session_start();
    require_once '../vendor/connect.php';
    
    $Login = filter_var(trim($_POST['Login']), FILTER_SANITIZE_STRING);
    $Pass = filter_var(trim($_POST['Pass']), FILTER_SANITIZE_STRING);
    
    $result = mysqli_query($connect, "SELECT `Login`, `Pass` FROM `accounts` WHERE `Login`='$Login' AND `Pass`='$Pass'");
    if(mysqli_num_rows($result) > 0){
        echo "Correct";
        header('Location: profile.php');
    }else{
        $_SESSION['auth'] = "Wrong login or password";
        header('Location: authorization.php');
    }
    exit();
?>