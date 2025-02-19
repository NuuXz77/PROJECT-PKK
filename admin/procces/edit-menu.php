<?php
include '../../backend/koneksi/koneksi.php';
session_start();

// Proses edit data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $deskripsi_produk = $_POST['deskripsi_produk'];
    $harga = $_POST['harga'];

    // Proses upload foto baru jika ada
    $foto_produk = $_FILES['foto_produk']['name'];
    if (!empty($foto_produk)) {
        $target_dir = "../img/";
        $target_file = $target_dir . $id_produk . "." . pathinfo($foto_produk, PATHINFO_EXTENSION);

        // Hapus foto lama
        $query = "SELECT foto_produk FROM produk WHERE id_produk = '$id_produk'";
        $result = $con->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (file_exists("../img/" . $row['foto_produk'])) {
                unlink("../img/" . $row['foto_produk']);
            }
        }

        // Upload foto baru
        move_uploaded_file($_FILES['foto_produk']['tmp_name'], $target_file);

        // Update data dengan foto baru
        $sql = "UPDATE produk SET nama_produk = '$nama_produk', deskripsi_produk = '$deskripsi_produk', harga = '$harga', foto_produk = '$id_produk." . pathinfo($foto_produk, PATHINFO_EXTENSION) . "' WHERE id_produk = '$id_produk'";
    } else {
        // Update data tanpa mengganti foto
        $sql = "UPDATE produk SET nama_produk = '$nama_produk', deskripsi_produk = '$deskripsi_produk', harga = '$harga' WHERE id_produk = '$id_produk'";
    }

    if ($con->query($sql) === TRUE) {
        // echo "succes";
        header("Location: ../../dashboard/menu");
        $_SESSION['notif'] = 'Menu berhasil diubah!';
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

$con->close();
?>