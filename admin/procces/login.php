<?php
require('../../backend/koneksi/koneksi.php');
session_start();

if (isset($_POST)) {
    // var_dump($_POST);
    // die();
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_password'];
    // echo $email . "<br>" . $pass;

    $query = "SELECT * FROM users WHERE email = '$email' AND level='admin';";
    $sql = mysqli_query($con, $query);
    $rs = mysqli_fetch_assoc($sql);
    // var_dump($rs['email']);
    // var_dump($rs['password']);
    // //meng encripsi sederhana password
    // // $random_pass = password_hash($rs['password'], PASSWORD_DEFAULT);
    // // echo $random_pass;
    // die();
    if ($rs) {
        if (password_verify($pass, $rs['password'])) {
            $_SESSION['username'] = $rs['username'];
            $_SESSION['email'] = $email;
            $_SESSION['profile_image'] = $rs['profile_image'];
            $_SESSION['id_users'] = $rs['id_users'];
            header("Location: ../view/dashboard-admin");
            echo "Login Berhasil";
            exit();
        } else {
            echo "<script>
                    alert('Password Salah !!!');
                    window.location.href = '../view/login-admin';
                </script>";
        }
    } else {
        echo "<script>
                    alert('Email Tidak Ditemukan !!!');
                    window.location.href = '../view/login-admin';
                </script>";
    }
}
