<?php
include '../../backend/koneksi/koneksi.php';
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: ../login_form');
}

// Dapatkan username dari session (pastikan session username sudah disimpan di login_form)
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "User";
// echo $_SESSION['id_users'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../../style/sidebar.css">
    <style>
        /* Tambahan styling untuk dashboard */
        .dashboard-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 2rem;
            /* background-color: #fff9c4; */
            /* Warna kuning lembut */
            border-radius: 10px;
            /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); */
        }

        .dashboard-text {
            max-width: 50%;
        }

        .dashboard-text h2 {
            font-size: 2rem;
            color: #333;
        }

        .dashboard-text p {
            margin: 1rem 0;
            font-size: 1.2rem;
            color: #555;
        }

        .dashboard-text .btn {
            background-color: #ffeb3b;
            color: #333;
            font-weight: bold;
        }

        .dashboard-illustration img {
            max-width: 400px;
            height: auto;
        }
    </style>
</head>

<body id="body-pd">
    <header class="header sisi" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img">
            <img src="<?= htmlspecialchars($_SESSION['profile_image'] ?: 'https://via.placeholder.com/100') ?>" alt="Profile Picture">
        </div>
    </header>
    <div class="l-navbar sisi" id="nav-bar">
        <nav class="nav">
            <?php include 'sidebar/sidebar.php' ?>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <div id="dashboard" class="dashboard-container">
            <div class="dashboard-text">
                <h2>Selamat Datang, <?= htmlspecialchars($username) ?>!</h2>
                <p>Terima kasih telah bergabung dengan kami. Kami siap membantu memenuhi kebutuhan belanja Anda.</p>
                <button class="btn btn-warning" onclick="window.location.href='menu'">Pesan Sekarang</button>
            </div>
            <div class="dashboard-illustration">
                <img src="https://via.placeholder.com/400x300?text=Shopping+Illustration" alt="Shopping Illustration">
            </div>
        </div>
    </div>
    <!--Container Main end-->

    <script>

    </script>
</body>

</html>