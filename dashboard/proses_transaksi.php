<?php
include '../backend/koneksi/koneksi.php';
session_start();
// var_dump($_SESSION['id_users']);
// var_dump($_POST);
// var_dump($_POST['id_users']);
// die();

//auto number buat id_transaksi
function generateUID($con)
{
    // Query untuk mendapatkan UID terbesar yang ada di tabel
    $query = "SELECT MAX(id_transaksi) as max_uid FROM transaksi";
    $result = $con->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $maxUid = $row['max_uid'];

        if ($maxUid) {
            // Ambil angka dari UID terakhir (TRX001 -> 1)
            $number = (int)substr($maxUid, 4);
            $newNumber = $number + 1; // Tambahkan 1
        } else {
            // Jika belum ada UID, mulai dari TRX001
            $newNumber = 1;
        }

        // Format angka menjadi tiga digit, misalnya 1 -> 001
        return 'TRX' . str_pad($newNumber, 3,
            '0',
            STR_PAD_LEFT
        );
    } else {
        die("Error: " . $con->error);
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_trx = generateUID($con);
    $id_user = $_POST['id_users'];
    $nama_costumer = $_POST['nama_costumer'];
    $produk_dibeli = $_POST['produk_dibeli'];
    $harga = $_POST['harga'];
    $banyak_beli = $_POST['banyak_beli'];
    $total_harga = $_POST['total_harga'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $alamat_pengiriman = $metode_pembayaran === 'COD' ? $_POST['alamat_pengiriman'] : null;

    $query = "INSERT INTO transaksi (id_transaksi, id_user, nama_costumer, produk_dibeli, harga, banyak_beli, total_harga, metode_pembayaran, alamat_pengiriman, status_pembayaran, tanggal_transaksi) 
              VALUES ('$id_trx', '$id_user', '$nama_costumer', '$produk_dibeli', '$harga', '$banyak_beli', '$total_harga', '$metode_pembayaran', '$alamat_pengiriman', 'Pending', NOW())";

    if (mysqli_query($con, $query)) {
        header('Location: menu.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
}
