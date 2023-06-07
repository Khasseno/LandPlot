<?php

    session_start();

    require_once '../connect.php';

    if(!isset($_SESSION['landDivideFormInfo'])) {
        header("Location: ../../account/user/sendApplications/landDivideApplication.php");
        exit();
    }    

    $landDivideApplication = $_FILES['landDivideApplication']['name'];
    $format = substr($landDivideApplication, strrpos($landDivideApplication, '.'));
    $serverLandDivideApplication = 'landDivideApplication-'.$_SESSION['iin'].'-'.date('y-m-j-h-i-s').$format; 

    move_uploaded_file(
        $_FILES['landDivideApplication']['tmp_name'], 
        '../../documents/usersApplications/'.$serverLandDivideApplication
    );

    $scheme = $_FILES['scheme']['name'];
    $format = substr($scheme, strrpos($scheme, '.'));
    $serverScheme = 'scheme-'.$_SESSION['iin'].'-'.date('y-m-j-h-i-s').$format; 

    move_uploaded_file(
        $_FILES['scheme']['tmp_name'], 
        '../../documents/usersApplications/'.$serverScheme
    );

    $idCopy = $_FILES['idCopy']['name'];
    $format = substr($idCopy, strrpos($idCopy, '.'));
    $serverIdCopy = 'idCopy-'.$_SESSION['iin'].'-'.date('y-m-j-h-i-s').$format; 

    move_uploaded_file(
        $_FILES['idCopy']['tmp_name'], 
        '../../documents/usersApplications/'.$serverIdCopy
    );

    $iin = mysqli_real_escape_string($connect, htmlspecialchars($_SESSION['landDivideFormInfo']['iin']));
    $name = mysqli_real_escape_string($connect, htmlspecialchars($_SESSION['landDivideFormInfo']['name']));
    $certificateID = mysqli_real_escape_string($connect, htmlspecialchars($_SESSION['landDivideFormInfo']['certificateID']));
    $region = mysqli_real_escape_string($connect, htmlspecialchars($_SESSION['landDivideFormInfo']['region']));
    $city = mysqli_real_escape_string($connect, htmlspecialchars($_SESSION['landDivideFormInfo']['city']));
    $district = mysqli_real_escape_string($connect, htmlspecialchars($_SESSION['landDivideFormInfo']['district']));
    $address = mysqli_real_escape_string($connect, htmlspecialchars($_SESSION['landDivideFormInfo']['address']));

    if(mysqli_query($connect, "INSERT INTO `landdivide`
    (`name`, `iin`, `certificaId`, `region`, `city`, `district`, `address`, `application`, `scheme`, `copy`, `status`) 
    VALUES 
    ('$name', '$iin', '$certificateID', '$region', '$city', '$district', '$address', '$serverLandDivideApplication', '$serverScheme', '$serverIdCopy', 'sent')")) {
        header("Location: ../../account/profileuser.php");
    } else {
        header("Location: ../../account/user/sendApplications/landDivideApplication.php");
    }

?>