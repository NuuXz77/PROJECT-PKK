<?php
// Koneksi ke database
include '../../backend/koneksi/koneksi.php';
session_start();

// Proses hapus data
if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    // Hapus foto produk dari folder
    $query = "SELECT foto_produk FROM produk WHERE id_produk = '$id_produk'";
    $result = $con->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (file_exists("../img/" . $row['foto_produk'])) {
            unlink("../img/" . $row['foto_produk']);
        }
    }

    // Hapus data produk
    $sql = "DELETE FROM produk WHERE id_produk = '$id_produk'";
    if ($con->query($sql) === TRUE) {
        header("Location: ../../dashboard/menu");
        $_SESSION['notif'] = 'Menu berhasil terhapus!';
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
} else {
    echo "ID Produk tidak ditemukan!";
}

$con->close();
