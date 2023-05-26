<?php
    session_start();
    require_once 'connect.php';

    function fileUploader($file){
        $pname = $_FILES[$file]["name"];
        #temporary file name to store file
        $tname = $_FILES[$file]["tmp_name"];
        #upload directory path
        $uploads_dir = 'pdf';
        #TO move the uploaded file to specific location
        move_uploaded_file($tname, $uploads_dir.'/'.$pname);
        return $pname;     
    }

    $app = fileUploader("application");
    $scheme = fileUploader("scheme");
    $copy = fileUploader("copy");
    $sql = "INSERT INTO `landdivide` (`name`, `iin`, `certificateId`, `registrationData`, `address`, `application`, `scheme`, `copy`) VALUES ('1', '2', '3', '4', '5', '$app', '$scheme', '$copy')";
    if(mysqli_query($connect,$sql)){
        header('Location: landplot.php');
    }
    else{
        header('Location: ../index.html');
    }
    

    // $_SESSION['SUCCESS'] = "Ваша заявка принята на рассмотрение";
    exit();    
?>