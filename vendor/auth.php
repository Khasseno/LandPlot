<?php
    session_start();
    require_once 'connect.php';
    
    $Login = filter_var(trim($_POST['Login']), FILTER_SANITIZE_STRING);
    $Pass = filter_var(trim($_POST['Pass']), FILTER_SANITIZE_STRING);
    
    $result = mysqli_query($connect, "SELECT `iin`, `pass` FROM `accounts` WHERE `iin`='$Login' AND `pass`='$Pass'");
    if(mysqli_num_rows($result) > 0){
        echo "Correct";
        $status = mysqli_fetch_assoc(mysqli_query($connect, "SELECT `status` FROM `accounts` WHERE `iin`='$Login' AND `pass`='$Pass'"))['status'];
        $_SESSION['status'] = $status;
        $_SESSION['iin'] = $Login;
        switch($status){
            case 'user':
                header('Location: ../account/profileuser.php');
                break;
            case 'worker':
                header('Location: ../account/profileworker.php');
                break;
            case 'head':
                header('Location: ../account/profilehead.php');
                break;
        }
    }else{
        $_SESSION['auth'] = "Неверный логин или пароль";
        header('Location: ../account/authorization.php');
    }
    exit();
?>
