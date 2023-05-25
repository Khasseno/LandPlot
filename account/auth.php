<?php
    session_start();
    require_once '../vendor/connect.php';
    
    $Login = filter_var(trim($_POST['Login']), FILTER_SANITIZE_STRING);
    $Pass = filter_var(trim($_POST['Pass']), FILTER_SANITIZE_STRING);
    
    $result = mysqli_query($connect, "SELECT `Login`, `Pass` FROM `accounts` WHERE `Login`='$Login' AND `Pass`='$Pass'");
    if(mysqli_num_rows($result) > 0){
        echo "Correct";
        $status = mysqli_fetch_assoc(mysqli_query($connect, "SELECT `Status` FROM `accounts` WHERE `Login`='$Login' AND `Pass`='$Pass'"))['Status'];
        switch($status){
            case 'User':
                header('Location: profileuser.php');
                break;
            case 'Worker':
                header('Location: profileworker.php');
                break;
            case 'Head':
                header('Location: profilehead.php');
                break;
        }
    }else{
        $_SESSION['auth'] = "Неверный логин или пароль";
        header('Location: authorization.php');
    }
    exit();
?>