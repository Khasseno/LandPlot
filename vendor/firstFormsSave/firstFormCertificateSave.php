<?php
    session_start();

    $amountOfChildren = $_POST['amount-of-children'];

    $childrenNames = [];
    $childrenIINs = [];

    for ($i = 1; $i <= $amountOfChildren; $i++) {
        array_push($childrenNames, $_POST['child-name-'.$i]);
    }

    for ($i = 1; $i <= $amountOfChildren; $i++) {
        array_push($childrenIINs, $_POST['child-iin-'.$i]);
    }

    $_SESSION['certificateFormInfo'] = [
    'applicantIIN' => $_POST['iin'],
    'applicantSurname' => $_POST['surname'],
    'applicantName' => $_POST['name'],
    'applicantPatronymic' => $_POST['patronymic'],
    'applicantCertificateID' => $_POST['id-number'],
    'marriageNumber' => $_POST['marriage-number'],
    'spouseName' => $_POST['spouse'],
    'spouseIIN' => $_POST['spouse-iin'],
    'childrenNames' => $childrenNames,
    'childrenIINs' => $childrenIINs,
    'region' => $_POST['region'],
    'city' => $_POST['city'],
    'district' => $_POST['district'],
    'address' => $_POST['street']
    ];

    header('Content-type: application/json');
?>