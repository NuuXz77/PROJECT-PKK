<?php
include '../backend/koneksi/koneksi.php';

$id_transaksi = $_GET['id'];
$query = "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi'";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Transaksi</title>
    <?php
    include '../modular/icon.php';
    ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
            width: 80%;
            max-width: 400px;
            margin: 20px auto;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .header p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }

        .content {
            font-size: 14px;
            line-height: 1.6;
        }

        .content p {
            margin: 10px 0;
        }

        .content strong {
            display: inline-block;
            width: 150px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }

        .footer button {
            margin: 5px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-print {
            background-color: #007bff;
            color: #fff;
        }

        .btn-back {
            background-color: #6c757d;
            color: #fff;
        }

        .btn-print:hover {
            background-color: #0056b3;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>SAFSAR</h1>
            <p>Alamat: Jl. Raya Contoh No. 123, Kota Anda</p>
            <p>Telp: 0812-3456-7890</p>
        </div>

        <div class="content">
            <p><strong>ID Transaksi:</strong> <?= $data['id_transaksi'] ?></p>
            <p><strong>Nama Costumer:</strong> <?= htmlspecialchars($data['nama_costumer']) ?></p>
            <p><strong>Produk Dibeli:</strong> <?= htmlspecialchars($data['produk_dibeli']) ?></p>
            <p><strong>Harga:</strong> Rp <?= number_format($data['harga'], 0, ',', '.') ?></p>
            <p><strong>Banyak Beli:</strong> <?= $data['banyak_beli'] ?></p>
            <p><strong>Total Harga:</strong> Rp <?= number_format($data['total_harga'], 0, ',', '.') ?></p>
            <p><strong>Tanggal Transaksi:</strong> <?= $data['tanggal_transaksi'] ?></p>
        </div>

        <div class="footer">
            <button class="btn-print" onclick="window.print()">Cetak</button>
            <button class="btn-back" onclick="window.location.href='transaksi.php'">Kembali</button>
        </div>
    </div>
</body>

</html>