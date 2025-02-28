<?php
     $server = 'bf3sgd9coetcbwmoanvr-mysql.services.clever-cloud.com';
     $username = 'u7m88jwogemd5bwx';
     $pass = 'JQVbDIOXA5f88eaqdpsF';
     $database = 'bf3sgd9coetcbwmoanvr';
     $conn = mysqli_connect($server, $username, $pass, $database);
     if (!$conn) {
        die("Database is not connected" . mysqli_connect_error());
     }
?>