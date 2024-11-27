<?php
require('koneksi/koneksi.php');
session_start();

/**
 * Fungsi untuk menghasilkan UID otomatis dengan format USER001, USER002, dst.
 */
function generateUID($con)
{
    // Query untuk mendapatkan UID terbesar yang ada di tabel
    $query = "SELECT MAX(id_users) as max_uid FROM users";
    $result = $con->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $maxUid = $row['max_uid'];

        if ($maxUid) {
            // Ambil angka dari UID terakhir (USER001 -> 1)
            $number = (int)substr($maxUid, 4);
            $newNumber = $number + 1; // Tambahkan 1
        } else {
            // Jika belum ada UID, mulai dari USER001
            $newNumber = 1;
        }

        // Format angka menjadi tiga digit, misalnya 1 -> 001
        return 'USER' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    } else {
        die("Error: " . $con->error);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = $_POST['txt_email'];
    $user = $_POST['txt_username'];
    $pass1 = $_POST['txt_password'];

    // Enkripsi password
    $encPass = password_hash($pass1, PASSWORD_DEFAULT);

    // Generate UID baru
    $uid = generateUID($con);

    // Query untuk menyimpan data pengguna
    $query = "INSERT INTO users (id_users, email, username, password, created_at, level) VALUES ('$uid', '$mail', '$user', '$encPass', NOW(), 'member')";

    if ($con->query($query)) {
        echo "
            <script>
                alert('Data akun berhasil tersimpan');
                window.location.href = '../login_form.php';
            </script>";
    } else {
        echo "Error: " . $con->error;
    }
}

$con->close();
