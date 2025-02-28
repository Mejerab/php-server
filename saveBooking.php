<?php
include '_header.php';
 
     $rawData = file_get_contents('php://input');
     $data = json_decode($rawData, true);
     if ($data['request'] === 'booking') {
        require '_dbconnect.php';
        $id = $data['id'];
        $origin = mysqli_real_escape_string($conn, $data['origin']);
        $dest = mysqli_real_escape_string($conn, $data['dest']);
        $from = $data['from'];
        $to = $data['to'];
        $sql = "INSERT INTO `bookings` (`user_serial`, `origin`, `dest`, `from_date`, `to_date`) VALUES ('$id', '$origin', '$dest', '$from', '$to')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo json_encode(['success'=>true]);
        }
        else{
            echo json_encode(['error'=>true]);
        }
     }
?>