<?php
    $host = "localhost";
    $db = "db_safsar";
    $user = "root";
    $pass = "";

    $con = mysqli_connect($host, $user, $pass, $db);
    if($con){
        // echo "Sukses <br>";
    }else{
        echo "Gagal";
    }
    
    mysqli_select_db($con, $db);
?>