<?php
include '../backend/koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_transaksi = $_POST['id_transaksi'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $alamat_pengiriman = $_POST['alamat_pengiriman'] ?? null;
    $uang_bayar = $_POST['uang_bayar'] ?? null;
    $uang_kembalian = $_POST['uang_kembalian'] ?? null;

    if ($metode_pembayaran === 'COD') {
        if (empty($alamat_pengiriman)) {
            echo "<script>alert('Alamat pengiriman wajib diisi untuk metode pembayaran COD!'); window.history.back();</script>";
            exit;
        }

        $query = "UPDATE transaksi SET 
                    metode_pembayaran = '$metode_pembayaran',
                    alamat_pengiriman = '$alamat_pengiriman',
                    uang_bayar = NULL,
                    uang_kembalian = NULL
                  WHERE id_transaksi = '$id_transaksi'";
    } else {
        if (empty($uang_bayar) || $uang_bayar < $row['total_harga']) {
            echo "<script>alert('Uang bayar tidak cukup atau tidak diisi!'); window.history.back();</script>";
            exit;
        }

        $query = "UPDATE transaksi SET 
                    metode_pembayaran = '$metode_pembayaran',
                    alamat_pengiriman = NULL,
                    uang_bayar = '$uang_bayar',
                    uang_kembalian = '$uang_kembalian'
                  WHERE id_transaksi = '$id_transaksi'";
    }

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Transaksi berhasil diperbarui!'); window.location.href = 'transaksi.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui transaksi!'); window.history.back();</script>";
    }
}
?>
