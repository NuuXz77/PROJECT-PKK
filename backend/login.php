<?php
require('koneksi/koneksi.php');
session_start();

if (isset($_POST)) {
    // var_dump($_POST);
    // die();
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_password'];
    // echo $email . "<br>" . $pass;

    $query = "SELECT * FROM users WHERE email = '$email';";
    $sql = mysqli_query($con, $query);
    $rs = mysqli_fetch_assoc($sql);
    // var_dump($rs['email']);
    // var_dump($rs['password']);
    // //meng encripsi sederhana password
    // // $random_pass = password_hash($rs['password'], PASSWORD_DEFAULT);
    // // echo $random_pass;
    // die();
    if ($rs) {
<<<<<<< HEAD
        if (password_verify($pass, $rs['password'])) {
            $_SESSION['username'] = $rs['username'];
            $_SESSION['email'] = $email;
            header("Location: ../dashboard/dashboard");
            echo "Login Berhasil";
            exit();
        } else {
            echo "<script>
                    alert('Password Salah !!!');
                    window.location.href = '../login_form.php';
                </script>";
        }
    } else {
        echo "<script>
                    alert('Email Tidak Ditemukan !!!');
                    window.location.href = '../login_form.php';
                </script>";
=======
        if($rs['status'] == 'Terverifikasi'){
            if (password_verify($pass, $rs['password']) && $rs['level'] == 'member') {
                $_SESSION['username'] = $rs['username'];
                $_SESSION['email'] = $email;
                $_SESSION['profile_image'] = $rs['profile_image'];
                $_SESSION['id_users'] = $rs['id_users'];
                $_SESSION['level'] = $rs['level'];
                $_SESSION['status'] = "success, Berhasil !, Login Berhasil !, #ffe31a";
                header("Location: ../dashboard/dashboard"); 
                echo "Login Berhasil";
                exit();
            } else if (password_verify($pass, $rs['password']) && $rs['level'] == 'admin') {
                $_SESSION['username'] = $rs['username'];
                $_SESSION['email'] = $email;
                $_SESSION['profile_image'] = $rs['profile_image'];
                $_SESSION['id_users'] = $rs['id_users'];
                $_SESSION['level'] = $rs['level'];
                $_SESSION['status'] = "success, Berhasil !, Login Berhasil !, #ffe31a";
                header("Location: ../dashboard/dashboard");
                echo "Login Berhasil";
                exit();
            } else {
                $_SESSION['status'] = "error, Gagal !, Password Salah !, #dc3545";
                header( "Location: ../login_form.php");
            }
        } else{
            $_SESSION['status'] = "error, Gagal !, Silahkan Verifikasi Email !, #dc3545";
            header("Location: ../login_form.php");
        }
    } else {        
        $_SESSION['status'] = "error, Gagal !, Email Tidak Di temukan !, #dc3545";
        header("Location: ../login_form.php");
>>>>>>> 68d6b83 (DONE)
    }
}
