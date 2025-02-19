<?php
include '../backend/koneksi/koneksi.php';
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: ../login_form.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../style/sidebar.css">
=======
    <title>Help</title>
    <?php
    include '../modular/library.php';
    include '../modular/icon.php';
    ?>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .help-container {
            padding: 20px;
        }

        .help-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background: white;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .help-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .help-card i {
            font-size: 40px;
            color: #ffcc00;
            margin-bottom: 10px;
        }

        .help-card h5 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
        }

        .help-card p {
            color: #777;
            font-size: 14px;
        }

        .help-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .help-header h1 {
            font-size: 28px;
            color: #333;
        }
    </style>
>>>>>>> 68d6b83 (DONE)
</head>

<body id="body-pd">
    <header class="header sisi" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
<<<<<<< HEAD
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
=======
        <div class="header_img">
            <img src="<?= htmlspecialchars($_SESSION['profile_image'] ?: 'https://via.placeholder.com/100') ?>" alt="Profile Picture">
        </div>
>>>>>>> 68d6b83 (DONE)
    </header>
    <div class="l-navbar sisi" id="nav-bar">
        <nav class="nav">
            <?php include 'sidebar/sidebar.php' ?>
        </nav>
    </div>
    <!--Container Main start-->
<<<<<<< HEAD
    <div class="height-100 bg-light">
        <div id="help">
            <h1>help</h1>
        </div>
    </div>
    <!--Container Main end-->

    <!-- <script src="../js/sidebar.js"> -->

    </script>
=======
    <div class="height-100 bg-light help-container">
        <div class="help-header">
            <h1>How can we help you?</h1>
            <p class="text-muted">Explore common topics below or contact our support team for further assistance.</p>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="help-card">
                    <i class='bx bx-info-circle'></i>
                    <h5>Bagaimana Pemesanan ?</h5>
                    <p>Jika Anda Memiliki Masalah Saat Memesan Suatu Produk , Anda Bisa Hubungi Kami.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="help-card">
                    <i class='bx bx-cog'></i>
                    <h5>Pengaturan Akun</h5>
                    <p>Jika Anda Lupa Kata Sandi, Anda Bisa Reset Kata Sandi Tersebut Apapun Yang Anda Inginkan.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="help-card">
                    <i class='bx bx-data'></i>
                    <h5>Data Aman</h5>
                    <p>Akun Anda Hanya Bisa Di Lihat Oleh Anda, Terkecuali Anda Memiliki Masalah Bisa Hubungi Kami.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="help-card">
                    <i class='bx bx-lock'></i>
                    <h5>Privacy & Security</h5>
                    <p>Learn about our security features and how to protect your account and data.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="help-card">
                    <i class='bx bx-support'></i>
                    <h5>Technical Support</h5>
                    <p>Encountering issues? Get step-by-step solutions or connect with our support team directly.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="help-card">
                    <i class='bx bx-book-reader'></i>
                    <h5>Documentation</h5>
                    <p>Access detailed guides, FAQs, and other resources to help you navigate the platform.</p>
                </div>
            </div>
        </div>
    </div>
    <!--Container Main end-->
>>>>>>> 68d6b83 (DONE)
</body>

</html>