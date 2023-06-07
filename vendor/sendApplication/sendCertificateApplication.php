<?php

    session_start();

    require_once '../connect.php';

    $mainApplication = $_FILES['mainApplication']['name'];
    $format = substr($mainApplication, strrpos($mainApplication, '.'));
    $serverMainApplication = 'mainApplicaiton-'.$_SESSION['iin'].'-'.date('y-m-j-h-i-s').$format; 

    move_uploaded_file(
        $_FILES['mainApplication']['tmp_name'], 
        '../../documents/usersApplications/'.$serverMainApplication
    );

    $identifyDoc = $_FILES['identifyDoc']['name'];
    $format = substr($identifyDoc, strrpos($identifyDoc, '.'));
    $serverIdentifyDoc = 'identifyDoc-'.$_SESSION['iin'].'-'.date('y-m-j-h-i-s').$format; 

    move_uploaded_file(
        $_FILES['identifyDoc']['tmp_name'], 
        '../../documents/usersApplications/'.$serverIdentifyDoc
    );

    $incomeStatement = $_FILES['incomeStatement']['name'];
    $format = substr($incomeStatement, strrpos($incomeStatement, '.'));
    $serverIncomeStatement = 'incomeStatement-'.$_SESSION['iin'].'-'.date('y-m-j-h-i-s').$format; 

    move_uploaded_file(
        $_FILES['incomeStatement']['tmp_name'], 
        '../../documents/usersApplications/'.$serverIncomeStatement
    );

    $workStatement = $_FILES['workStatement']['name'];
    $format = substr($workStatement, strrpos($workStatement, '.'));
    $serverWorkStatement = 'workStatement-'.$_SESSION['iin'].'-'.date('y-m-j-h-i-s').$format; 

    move_uploaded_file(
        $_FILES['workStatement']['tmp_name'], 
        '../../documents/usersApplications/'.$serverWorkStatement
    );

    $STBMassage = $_FILES['STBMassage']['name'];
    $format = substr($STBMassage, strrpos($STBMassage, '.'));
    $serverSTBMassage = 'STBMassage-'.$_SESSION['iin'].'-'.date('y-m-j-h-i-s').$format; 

    move_uploaded_file(
        $_FILES['STBMassage']['tmp_name'], 
        '../../documents/usersApplications/'.$serverSTBMassage
    );

    $applicantIIN = mysqli_real_escape_string($connect, htmlspecialchars($_SESSION['certificateFormInfo']['applicantIIN']));
    $applicantName = mysqli_real_escape_string($connect, htmlspecialchars($_SESSION['certificateFormInfo']['applicantSurname'].' '.$_SESSION['certificateFormInfo']['applicantName'].' '.$_SESSION['certificateFormInfo']['applicantPatronymic']));
    $applicantCertificateID = mysqli_real_escape_string($connect, htmlspecialchars($_SESSION['certificateFormInfo']['applicantCertificateID']));
    $marriageNumber = mysqli_real_escape_string($connect, htmlspecialchars($_SESSION['certificateFormInfo']['marriageNumber']));
    $spouseName = mysqli_real_escape_string($connect, htmlspecialchars($_SESSION['certificateFormInfo']['spouseName']));
    $spouseIIN = mysqli_real_escape_string($connect, htmlspecialchars($_SESSION['certificateFormInfo']['spouseIIN']));
    $childrenNames = mysqli_real_escape_string($connect, htmlspecialchars(implode('; ', $_SESSION['certificateFormInfo']['childrenNames'])));
    $childrenIINs = mysqli_real_escape_string($connect, htmlspecialchars(implode('; ', $_SESSION['certificateFormInfo']['childrenIINs'])));
    $region = mysqli_real_escape_string($connect, htmlspecialchars($_SESSION['certificateFormInfo']['region']));
    $city = mysqli_real_escape_string($connect, htmlspecialchars($_SESSION['certificateFormInfo']['city']));
    $district = mysqli_real_escape_string($connect, htmlspecialchars($_SESSION['certificateFormInfo']['district']));
    $address = mysqli_real_escape_string($connect, htmlspecialchars($_SESSION['certificateFormInfo']['address']));

    if(mysqli_query($connect, "INSERT INTO `certificate` 
    (`applicantIIN`, `applicantName`, `applicantCertificateID`, `marriageNumber`, `spouseName`, `spouseIIN`, `childrenNames`, `childrenIINs`, `region`, `city`, `district`, `address`, `mainApplication`, `identifyDoc`, `incomeStatement`, `workStatement`, `STBMassage`, `status`, `response`) 
    VALUES 
    ('$applicantIIN','$applicantName','$applicantCertificateID','$marriageNumber','$spouseName','$spouseIIN','$childrenNames','$childrenIINs','$region','$city','$district','$address','$serverMainApplication','$serverIdentifyDoc','$serverIncomeStatement','$serverWorkStatement','$serverSTBMassage', 'sent', '')")) {
        header("Location: ../../account/profileuser.php");
    } else {
        header("Location: ../../account/certificateApplicationNext.php");
    }
?>