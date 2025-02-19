<?php
include '../backend/koneksi/koneksi.php';
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: ../login_form.php');
}
<<<<<<< HEAD
=======

$no = 0;

// echo $_SESSION['id_users'];
// die();

// Ambil data produk
$query = "SELECT * FROM messages";
$result = mysqli_query($con, $query);
>>>>>>> 68d6b83 (DONE)
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
    <title>Message</title>
    <?php
    include '../modular/library.php';
    include '../modular/icon.php';
    ?>
    <style>
        .container {
            font-family: 'Arial', sans-serif;
        }

        h1,
        h3 {
            color: #333;
        }

        a {
            text-decoration: none;
        }

        a.btn {
            font-size: 0.9rem;
        }

        form {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        form button {
            width: 100%;
        }

        form input,
        form textarea {
            border-radius: 4px;
            border: 1px solid #ddd;
            padding: 10px;
            width: 100%;
        }

        .modal-dialog {
            width: 100%;
            /* Modal memenuhi layar penuh */
            margin: 0 auto;
            /* Pastikan modal tetap berada di tengah horizontal */
            height: 100vh;
            /* Modal memenuhi layar penuh secara vertikal */
            display: flex;
            justify-content: center;
            /* Konten di tengah horizontal */
            align-items: center;
            /* Konten di tengah vertikal */
        }

        .modal {
            width: 100%;
            justify-content: center;
            align-items: center;
            margin: auto;
        }

        .modal-content {
            width: 100%;
            max-height: 90vh;
            /* Jika terlalu panjang, tetap berada dalam viewport */
            overflow-y: auto;
            /* Berikan scrollbar jika konten melebihi viewport */
        }

        .modal-backdrop {
            background-color: transparent !important;
            /* Hilangkan warna latar */
        }

        .alert {
            width: 100%;
            /* Modal memenuhi layar penuh */
            margin: 0 auto;
            /* Modal memenuhi layar penuh secara vertikal */
            display: flex;
            justify-content: center;
            /* Konten di tengah horizontal */
            align-items: center;
            /* Konten di tengah vertikal */
        }
    </style>
>>>>>>> 68d6b83 (DONE)
</head>

<body id="body-pd">
    <header class="header sisi" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
<<<<<<< HEAD
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar sisi" id="nav-bar">
        <nav class="nav">
            <?php include 'sidebar/sidebar.php' ?>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <div id="message">
            <h1>message</h1>
        </div>
    </div>
    <!--Container Main end-->

    <!-- <script src="../js/sidebar.js"> -->

=======
        <div class="header_img">
            <img src="<?= htmlspecialchars($_SESSION['profile_image'] ?: 'https://via.placeholder.com/100') ?>" alt="Profile Picture">
        </div>
    </header>
    <div class="l-navbar sisi" id="nav-bar">
        <nav class="nav">
            <?php include 'sidebar/sidebar.php'; ?>
        </nav>
    </div>
    <?php
    if ($_SESSION['level'] == 'member') {
        include '../modular/message_member.php';
    } else if ($_SESSION['level'] == 'admin') {
        include '../modular/message_admin.php';
    } ?>
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();

            if (!name || !email || !message) {
                e.preventDefault();
                alert('Semua field wajib diisi!');
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                e.preventDefault();
                alert('Email tidak valid!');
            }
        });

        function setViewPesan(id, nama, email, pesan, tanggal) {
            document.getElementById('view_id').textContent = id;
            document.getElementById('view_nama').textContent = nama;
            document.getElementById('view_email').textContent = email;
            document.getElementById('view_pesan').textContent = pesan;
            document.getElementById('view_tanggal').textContent = tanggal;
        }
>>>>>>> 68d6b83 (DONE)
    </script>
</body>

</html>