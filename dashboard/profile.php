<?php
include '../backend/koneksi/koneksi.php';
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: ../login_form.php');
<<<<<<< HEAD
=======
    exit;
}

$email = $_SESSION['email'];
$feedback = "";
$success = false; // Variabel untuk menentukan apakah perubahan berhasil

// Ambil data pengguna
$query = "SELECT * FROM users WHERE email = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Proses pembaruan profil
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $new_password = $_POST['password'];
    $created_at = date("Y-m-d H:i:s");
    $profile_image = $_FILES['profile_image']['name'];

    // Enkripsi password jika diubah
    $password_hashed = $user['password'];
    if (!empty($new_password)) {
        $password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
    }

    // Upload foto profil baru
    $target_file = $user['profile_image']; // Default ke foto lama
    if (!empty($profile_image)) {
        // Path folder uploads
        $target_dir = "uploads/";

        // Hapus foto profil lama jika ada
        if (!empty($user['profile_image']) && file_exists($user['profile_image'])) {
            unlink($user['profile_image']); // Hapus file lama
        }

        // Nama file baru berdasarkan user_id
        $file_extension = pathinfo($profile_image, PATHINFO_EXTENSION);
        $new_file_name = $user['id_users'] . '.' . $file_extension; // Nama file: user_id.ext
        $target_file = $target_dir . $new_file_name;

        // Upload file baru ke server
        move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file);
    }

    // Update data pengguna di database
    $update_query = "UPDATE users SET username = ?, password = ?, profile_image = ?, created_at = ? WHERE email = ?";
    $update_stmt = $con->prepare($update_query);
    $update_stmt->bind_param("sssss", $username, $password_hashed, $target_file, $created_at, $email);

    if ($update_stmt->execute()) {
        $_SESSION['username'] = $username;
        $_SESSION['profile_image'] = $target_file; // Perbarui foto di navbar
        $feedback = "Profil berhasil diperbarui!";
        $success = true; // Tandai perubahan berhasil
    } else {
        $feedback = "Terjadi kesalahan, silakan coba lagi.";
    }
>>>>>>> 68d6b83 (DONE)
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
</head>

<body id="body-pd">
    <header class="header sisi" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar sisi" id="nav-bar">
        <nav class="nav">
            <?php include 'sidebar/sidebar.php' ?>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <div id="profile">
            <h1>Profile</h1>
        </div>
    </div>
    <!--Container Main end-->

    <!-- <script src="../js/sidebar.js"> -->

    </script>
=======
    <title>Edit Profil</title>

    <?php
    include '../modular/library.php';
    include '../modular/icon.php';
    ?>

    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Profil container */
        .profile-container {
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            max-width: 600px;
            margin: 40px auto;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .profile-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-top: 8px;
            font-size: 16px;
        }

        .form-group img {
            display: block;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            border: 4px solid #ffd700;
        }

        .form-group input[type="file"] {
            border: none;
        }

        .btn-submit {
            display: block;
            width: 100%;
            background-color: #ffd700;
            color: #333;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #ffb300;
        }

        /* Responsif untuk tampilan lebih kecil */
        @media (max-width: 768px) {
            .profile-container {
                margin: 20px;
                padding: 25px;
            }

            .form-group input,
            .btn-submit {
                font-size: 14px;
            }
        }
    </style>
</head>

<body id="body-pd">
    <!-- Sidebar dan Navbar -->
    <header class="header sisi" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img">
            <img src="<?= htmlspecialchars($_SESSION['profile_image'] ?: 'https://via.placeholder.com/100') ?>" alt="Profile Picture">
        </div>
    </header>
    <div class="l-navbar sisi" id="nav-bar">
        <nav class="nav">
            <?php include 'sidebar/sidebar.php'; ?> <!-- Menyertakan sidebar -->
        </nav>
    </div>

    <div class="container mt-5">
        <div class="profile-container">
            <h2>Edit Profil</h2>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input type="password" id="password" name="password">
                    <small>*Kosongkan jika tidak ingin mengubah password</small>
                </div>
                <div class="form-group">
                    <label for="profile_image">Foto Profil</label>
                    <img src="<?= $_SESSION['profile_image'] ?: 'https://via.placeholder.com/100'; ?>" alt="Current Profile Image">
                    <input type="file" id="profile_image" name="profile_image" accept="image/*">
                </div>
                <button type="submit" class="btn-submit">Simpan Perubahan</button>
            </form>
        </div>
    </div>

    <!-- SweetAlert Notification -->
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
        <script>
            <?php if ($success) : ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Profil berhasil diperbarui!',
                    confirmButtonColor: '#ffd700'
                });
            <?php else : ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Terjadi kesalahan, silakan coba lagi.',
                    confirmButtonColor: '#ffd700'
                });
            <?php endif; ?>
        </script>
    <?php endif; ?>
>>>>>>> 68d6b83 (DONE)
</body>

</html>