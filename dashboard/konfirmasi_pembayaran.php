<?php
include '../backend/koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_transaksi = $_POST['id_transaksi'];
    $aksi = $_POST['aksi']; // Bisa 'konfirmasi' atau 'tolak'

    if ($aksi === 'konfirmasi') {
        $query = "UPDATE transaksi SET status_pembayaran = 'Berhasil' WHERE id_transaksi = '$id_transaksi'";
    } elseif ($aksi === 'tolak') {
        $query = "UPDATE transaksi SET status_pembayaran = 'Ditolak' WHERE id_transaksi = '$id_transaksi'";
    }

    if (mysqli_query($con, $query)) {
        header('Location: transaksi.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
}