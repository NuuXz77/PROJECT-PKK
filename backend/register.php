<?php
require('koneksi/koneksi.php');
session_start();

if (isset($_POST)) {
    // var_dump($_POST);
    // die();
    $mail = $_POST['txt_email'];
    $user = $_POST['txt_username'];
    $pass1 = $_POST['txt_password'];
    // $pass2 = $_POST['password2'];

    $encPass = password_hash($pass1, PASSWORD_DEFAULT);

    $query = "INSERT INTO users VALUES ('','$mail','$user','$encPass',now())";
    // $sql = mysqli_query($con, $query);
    // $querySelect = "SELECT * FROM users WHERE email = '$mail'";
    // $sqlSelect = mysqli_query($con, $querySelect);
    // $rs = mysqli_fetch_assoc($sqlSelect);
    // var_dump($rs);
    // die();
    if ($con->query($query)) {
        echo "
            <script>
                alert('Data akun berhasil tersimpan');
                window.location.href = '../login_form.php';
            </script>";
    } else if ($mail == $rs['email']) {
        echo "gagal";
    }
}
$con->close();
