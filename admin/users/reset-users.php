<?php
// Koneksi ke database
include '../../backend/koneksi/koneksi.php';
session_start();

if(isset($_GET['id_users'])){
    // Hapus foto produk dari folder
    $id_users = $_GET['id_users'];
    $new_password = "tim-safsar";
    $hash = password_hash($new_password, PASSWORD_DEFAULT);

    //buat query bayu
    $query = "UPDATE users SET password = '$hash' WHERE id_users = '$id_users'";
    $succes = mysqli_query($con,$query);

    if($succes){
        header("Location: ../../dashboard/users.php");
        exit();
    }else{
        echo "<h1>aduh</h1>";
    }
}
?>