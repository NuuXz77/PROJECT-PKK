<?php
require('../../backend/koneksi/koneksi.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // var_dump($_POST);
    // die();
    $uid = $_POST['id_users'];
    $mail = $_POST['email'];
    $user = $_POST['username'];
    $pass1 = $_POST['password'];
    $level = $_POST['level'];

    // Enkripsi password
    $encPass = password_hash($pass1, PASSWORD_DEFAULT);

    // Query untuk menyimpan data pengguna
    $query = "INSERT INTO users (id_users, email, username, password, created_at, level, profile_image) VALUES ('$uid', '$mail', '$user', '$encPass', NOW(), '$level', 'uploads/default.jpg')";

    if ($con->query($query)) {
        echo "succes";
    } else {
        echo "Error: " . $con->error;
    }
}

$con->close();
