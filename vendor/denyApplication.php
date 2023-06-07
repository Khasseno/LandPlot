<?php

    session_start();

    require_once 'connect.php';

    $id = mysqli_real_escape_string($connect, htmlspecialchars($_POST['id']));
    $tableName = $_POST['applicationName'];
    
    switch ($tableName) {
        case 'certificate':
            try {
                $responseFile = 'DenyApplication-certificate-'.date('y-m-j-h-i-s').'.pdf';
                if (!move_uploaded_file($_FILES['response']['tmp_name'], '../documents/responseFiles/'.$responseFile)) {
                    header('Location: ../account/worker/applications/certificate.php?id='.$id);
                    echo    '<script>
                                alert("Произошла ошибка");
                            </script>';
                    exit();
                }

                mysqli_query($connect, "UPDATE `certificate` SET `status` = 'deny' WHERE `id` = '$id'");
                mysqli_query($connect, "UPDATE `certificate` SET `response` = '$responseFile' WHERE `id` = '$id'");
                header("Location: ../account/profileworker.php");
            } catch (Exeption $e) {
                echo 'Произошла ошибка: '.$e;
            }
            break;
        case 'landDivide':
            try {
                $responseFile = 'DenyApplication-landdivide-'.date('y-m-j-h-i-s').'.pdf'; 
                if (!move_uploaded_file($_FILES['response']['tmp_name'], '../documents/responseFiles/'.$responseFile)) {
                    header('Location: ../account/worker/applications/LandDivide.php?id='.$id);
                    echo    '<script>
                                alert("Произошла ошибка");
                            </script>';
                    exit();
                }

                mysqli_query($connect, "UPDATE `landdivide` SET `status` = 'deny' WHERE `id` = '$id'");
                mysqli_query($connect, "UPDATE `landdivide` SET `response` = '$responseFile' WHERE `id` = '$id'");
                header("Location: ../account/profileworker.php");
            } catch (Exeption $e) {
                echo 'Произошла ошибка: '.$e;
            }
            break;
        default:
            header('Location: ../account/profileworker.php');
            echo    '<script>
                        alert("Произошла ошибка");
                    </script>';
    }
?>