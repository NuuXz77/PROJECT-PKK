<?php
// Koneksi ke database
include '../../backend/koneksi/koneksi.php';
session_start();

// Proses hapus data
if (isset($_GET['id_users'])) {
    $id_users = $_GET['id_users'];

    // Hapus foto produk dari folder
    $query = "SELECT profile_image FROM users WHERE id_users = '$id_users'";
    $result = $con->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (file_exists("../../dashboard/uploads/" . $row['profile_image'])) {
            unlink("../../dashboard/uploads/" . $row['profile_image']);
        }
    }

    // Hapus data produk
    $sql = "DELETE FROM users WHERE id_users = '$id_users'";
    if ($con->query($sql) === TRUE) {
        header("Location: ../../dashboard/users");
        $_SESSION['notif'] = 'User berhasil terhapus!';
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
} else {
    echo "ID User tidak ditemukan!";
}

$con->close();
