<?php
include '_header.php';

    $rawData = file_get_contents('php://input');
    $post = json_decode($rawData, true);
    if ($post['request'] == 'post') { 
        require '_dbconnect.php';
        $firstName = $post['firstName'];
        $lastName = $post['lastName'];
        $email = $post['email'];
        $confirmPass = $post['confirmPass'];
        $exist = "SELECT * FROM `users` WHERE `email` = '$email'";
        $result = mysqli_query($conn, $exist);
        // echo ;
        $rows = mysqli_num_rows($result);
        if ($rows>0) {
            echo json_encode(['error'=>true]);
        }
        else{
            $hashedPass = password_hash($confirmPass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`name`, `email`, `pass`) VALUES ('$firstName $lastName', '$email', '$hashedPass')";
            $result2 = mysqli_query($conn, $sql);
            if ($result2) {
                echo $result2;
            }
        }
    }
?>