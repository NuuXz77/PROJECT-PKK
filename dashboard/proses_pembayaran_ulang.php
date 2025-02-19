<?php
include '../backend/koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_transaksi = trim($_POST['id_transaksi']);
    $metode_pembayaran = trim($_POST['metode_pembayaran']);
    $alamat = trim($_POST['alamat'] ?? '');
    $uang_bayar = $_POST['uang_bayar'] ?? null;

    // Debug data POST
    var_dump($_POST);

    // Ambil total harga
    $query = "SELECT total_harga FROM transaksi WHERE id_transaksi = '$id_transaksi'";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Query error: " . mysqli_error($con));
    }

    $data = mysqli_fetch_assoc($result);
    $total_harga = $data['total_harga'] ?? 0;

    // Debug total harga
    echo "Total Harga: $total_harga<br>";

    // Validasi input uang bayar
    // if ($uang_bayar < $total_harga) {
    //     die("Uang bayar kurang!");
    // }

    // $uang_kembali = $uang_bayar - $total_harga;

    // Query Update
    $queryUpdate = "UPDATE transaksi 
                    SET metode_pembayaran = '$metode_pembayaran', 
                        alamat_pengiriman = '$alamat', 
                        uang_bayar = '$uang_bayar', 
                        uang_kembalian = '$uang_kembali', 
                        status_pembayaran = 'Pending' 
                    WHERE id_transaksi = '$id_transaksi'";

    // Debug query
    echo "Query: $queryUpdate<br>";
    // die();
    // Eksekusi query dan cek error
    if (mysqli_query($con, $queryUpdate)) {
        echo "Update berhasil. Baris yang terpengaruh: " . mysqli_affected_rows($con);
        header('Location: transaksi.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

?>