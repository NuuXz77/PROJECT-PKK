<?php
include '../backend/koneksi/koneksi.php'; // Koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_transaksi = $_POST['id_transaksi'];
    $status_pembayaran = $_POST['status_pembayaran'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $alamat_pengiriman = $_POST['metode_pembayaran'] == 'COD' ? $_POST['alamat_pengiriman'] : null;

    $query = "UPDATE transaksi SET 
                status_pembayaran = '$status_pembayaran', 
                metode_pembayaran = '$metode_pembayaran', 
                alamat_pengiriman = " . ($alamat_pengiriman ? "'$alamat_pengiriman'" : "NULL") . " 
              WHERE id_transaksi = '$id_transaksi'";

    if (mysqli_query($con, $query)) {
        header('Location: transaksi.php?status=success');
    } else {
        header('Location: transaksi.php?status=error');
    }
}
