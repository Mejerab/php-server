<?php
include '_header.php';

    $rawData = file_get_contents('php://input');
    $data = json_decode($rawData, true);
    if ($data['request'] == 'login') {
        require '_dbconnect.php';
        $email = $data['email'];
        $pass = $data['pass'];
        $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num>0 && $result) {
            // echo $num;
            $row = mysqli_fetch_assoc($result);
            if (password_verify($pass, $row['pass'])) {
                echo json_encode(['success'=>true, 'username'=>$row['name'], 'serial'=>$row['serial']]);
            }
        }
    }
?>