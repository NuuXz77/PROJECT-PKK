<?php
include '../backend/koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // var_dump($_POST);
    // die();
    $id_transaksi = $_POST['id_transaksi'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $alamat = $_POST['alamat'] ?? null;
    $uang_bayar = $_POST['uang_bayar'] ?? null;

    // Ambil total harga dari database
    $query = "SELECT total_harga FROM transaksi WHERE id_transaksi = '$id_transaksi'";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($result);
    $total_harga = $data['total_harga'];

    // Validasi input uang bayar
    if ($uang_bayar < $total_harga) {
        die("Uang bayar kurang! Silakan bayar sesuai total harga.");
    }

    // Hitung uang kembali
    $uang_kembali = $uang_bayar - $total_harga;

    // Update transaksi
    $queryUpdate = "UPDATE transaksi 
                    SET metode_pembayaran = '$metode_pembayaran', 
                        alamat_pengiriman = '$alamat', 
                        uang_bayar = '$uang_bayar',
                        uang_kembalian = '$uang_kembali',
                        status_pembayaran = 'Pending' 
                    WHERE id_transaksi = '$id_transaksi'";

    if (mysqli_query($con, $queryUpdate)) {
        header('Location: transaksi.php');
    } else {
        echo "Error: " . $queryUpdate . "<br>" . mysqli_error($con);
    }
}
