<?php
// Hubungkan ke database
include '../backend/koneksi/koneksi.php';

// Ambil data dari tabel
$sql = "SELECT * FROM messages"; // Ganti 'users' sesuai nama tabel Anda
$result = $con->query($sql);

date_default_timezone_set('Asia/Jakarta'); // Set zona waktu ke WIB

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include '../modular/icon.php';
    ?>
    <title>Laporan Pesan</title>
    <style>
        .print-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .print-header img {
            width: 80px;
            height: auto;
        }

        .print-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .print-table th,
        .print-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        .print-table th {
            background-color: #f2f2f2;
        }

        .footer {
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>

<body onload="window.print()">

    <div class="print-header">
        <img src="../img/I.svg" alt="Logo Safsar">
        <h2>SAFSAR</h2>
        <p>Jl. Cikoneng, Ciamis, Indonesia</p>
        <p>Laporan Pesan Yang Dikirim Oleh Pengguna</p>
        <p><strong>Tanggal: <?php echo date('d-m-Y'); ?></strong></p>
        <hr>
    </div>

    <table class="print-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode User</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['message'] . "</td>";
                    echo "<td>" . $row['created_at'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="footer">
        <p><em>Dicetak pada: <?php echo date('d-m-Y H:i:s'); ?></em></p>

    </div>

</body>

</html>

<?php $con->close(); ?>