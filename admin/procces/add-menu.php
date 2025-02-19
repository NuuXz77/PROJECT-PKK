<?php
// Koneksi ke database
include '../../backend/koneksi/koneksi.php';

// Proses input data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // var_dump($_POST);
    // var_dump($_FILES["foto_produk"]["name"]);
    // die();
    $id_produk = $_POST['id_menu'];
    $nama_produk = $_POST["nama_produk"];
    $deskripsi_produk = $_POST["deskripsi_produk"];
    $harga = $_POST['harga'];

    // Upload foto dengan nama sesuai id_produk
    $foto_produk = $_FILES["foto_produk"]["name"];
    $target_dir = "../img/";
    $file_extension = pathinfo($foto_produk, PATHINFO_EXTENSION);
    $new_file_name = $id_produk . '.' . $file_extension; // Nama file baru sesuai id_produk
    $target_file = $target_dir . $new_file_name;

    if (move_uploaded_file($_FILES["foto_produk"]["tmp_name"], $target_file)) {
        // Insert data ke database
        $sql = "INSERT INTO produk (id_produk, nama_produk, deskripsi_produk, harga, foto_produk) VALUES ('$id_produk', '$nama_produk', '$deskripsi_produk', '$harga', '$new_file_name')";
        if ($con->query($sql) === TRUE) {
            // header("Location: ../../dashboard/menu.php");
            echo "succes";

        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    } else {
        echo "Error: Gagal mengunggah file.";
    }
}

$con->close();