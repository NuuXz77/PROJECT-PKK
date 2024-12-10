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
    <title>Message</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../style/sidebar.css">
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
            <?php include 'sidebar/sidebar.php'; ?>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="container mt-5">
        <h1 class="text-center">Message</h1>
        <div class="row mt-4">
            <!-- Kontak Informasi -->
            <div class="col-md-6">
                <h3>Informasi Kontak</h3>
                <p><strong>Alamat:</strong> Jl. Contoh No. 123, Jakarta</p>
                <p><strong>Telepon:</strong> +62 812 3456 7890</p>
                <p><strong>Email:</strong> <a href="mailto:info@domain.com">info@domain.com</a></p>
                <h4>Ikuti Kami di Media Sosial:</h4>
                <div>
                    <a href="https://facebook.com" target="_blank" class="btn btn-primary btn-sm">
                        <i class='bx bxl-facebook'></i> Facebook
                    </a>
                    <a href="https://instagram.com" target="_blank" class="btn btn-danger btn-sm">
                        <i class='bx bxl-instagram'></i> Instagram
                    </a>
                    <a href="https://twitter.com" target="_blank" class="btn btn-info btn-sm">
                        <i class='bx bxl-twitter'></i> Twitter
                    </a>
                </div>
            </div>

            <!-- Form Kirim Pesan -->
            <div class="col-md-6">
                <h3>Kirim Pesan</h3>
                <form action="send_email.php" method="POST" id="contactForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Anda</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Anda</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan Anda</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Kirim</button>
                </form>
            </div>
        </div>
    </div>
    <!--Container Main end-->

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
    </script>
</body>

</html>