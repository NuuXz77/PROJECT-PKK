<?php
    require('../koneksi/koneksi.php');
    session_start();
    if(isset($_GET['token'])){
            $token = $_GET['token'];
            // membuat query untuk menyamakan token dari method get dan database
            $verify_query = "SELECT token, status FROM users WHERE token = '$token' LIMIT 1";   
            $verify_sql = mysqli_query($con, $verify_query);
            $result = mysqli_fetch_assoc($verify_sql);

            //cek result
            if($result){
                if($result['status'] == 'Belum Terverifikasi'){
                    $click_token = $result['token'];
                    $update_query = "UPDATE users SET status = 'Terverifikasi' WHERE token = '$click_token'";
                    $update_sql = mysqli_query($con, $update_query);
                    if($update_sql){
                        $_SESSION['status'] = "success, Berhasil !, Email berhasil diverifikasi !, #ffe31a";
                        header("Location: ../../login_form.php");
                    }
                }else {
                    $_SESSION['status'] = "success, Berhasil !, Email sudah diverifikasi sebelumnya !, #ffe31a";
                    header("Location: ../../login_form.php");
                }
            } else {
                $_SESSION['status'] = "error, Gagal !, Token tidak berlaku !, #dc3545";
                header("Location: ../../login_form.php");
            }
        } else {
            $_SESSION['status'] = "error, Gagal !, Token tidak berlaku !, #dc3545";
            header("Location: ../../login_form.php");
        }
?>