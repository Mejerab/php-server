<?php

     if (isset($_GET['serial'])) {
        require '_dbconnect.php';
        $userSerial = $_GET['serial'];
        $sql = "SELECT * FROM `bookings` WHERE `user_serial` = '$userSerial'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num>0) {
            $arr = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $datas = $row;
                array_push($arr, $datas);
            }
            echo json_encode($arr);
        }
     }
?>