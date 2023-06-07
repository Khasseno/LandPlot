<?php

    session_start();

    require_once "connect.php";


    $data = json_decode(file_get_contents('php://input'), true);
    var_dump($data['id']);

    $id = mysqli_real_escape_string($connect, htmlspecialchars($data['id']));
    $tableName = $data['applicationName'];

    switch ($tableName) {
        case 'landDivide':
            if (!mysqli_query($connect, "UPDATE `landdivide` SET `status`='accept' WHERE `id`='$id'")) {
                echo    '<script>
                            alert("Произошла ошибка");
                        </script>';
                exit();
            }
            
            break;
        case 'certificate':
            if (!mysqli_query($connect, "UPDATE `certificate` SET `status`='accept' WHERE `id`='$id'")) {
                echo    '<script>
                            alert("Произошла ошибка");
                        </script>';
                exit();
            }
            
            break;
        default:
            echo    '<script>
                        alert("Произошла ошибка");
                    </script>';
            exit();
            break;
    }

?> 