<?php
include '../../backend/koneksi/koneksi.php';
session_start();

$id_users = $_POST['id_users'];
$feedback = "";
$success = false;

// Ambil data pengguna dari database
$query = "SELECT * FROM users WHERE id_users = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $id_users);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $new_password = $_POST['password'];
    $level = $_POST['level'];
    $created_at = $user['created_at']; // Tetap gunakan waktu pembuatan awal
   // $profile_image = $_FILES['profile_image']['name'];

    // Enkripsi password jika diubah
    $password_hashed = $user['password']; // Default ke password lama
    if (!empty($new_password)) {
        $password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
    }

    // // Upload foto profil baru
    // $target_file = $user['profile_image']; // Default ke foto lama
    // if (!empty($profile_image)) {
    //     $target_dir = "uploads/";

    //     // Buat folder jika belum ada
    //     if (!file_exists($target_dir)) {
    //         mkdir($target_dir, 0777, true);
    //     }

    //     // Validasi ekstensi file
    //     $file_extension = strtolower(pathinfo($profile_image, PATHINFO_EXTENSION));
    //     $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    //     if (!in_array($file_extension, $allowed_extensions)) {
    //         echo "Hanya file dengan ekstensi JPG, JPEG, PNG, dan GIF yang diperbolehkan.";
    //         exit;
    //     }

    //     // Hapus foto profil lama jika ada
    //     if (!empty($user['profile_image']) && file_exists($user['profile_image'])) {
    //         unlink($user['profile_image']);
    //     }

    //     // Nama file baru berdasarkan user_id
    //     $new_file_name = $user['id_users'] . '.' . $file_extension;
    //     $target_file = $target_dir . $new_file_name;

    //     // Upload file ke server
    //     if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
    //         echo "File berhasil diupload ke " . $target_file;
    //     } else {
    //         echo "Gagal mengupload file.";
    //         print_r($_FILES['profile_image']); // Debug informasi file
    //         exit;
    //     }
    // }

    // Query update data pengguna
    $update_query = "UPDATE users SET email = '$email', username = '$username', password = '$password_hashed', level = '$level',created_at = now() WHERE id_users = '$id_users'";
    // $update_stmt = $con->prepare($update_query);
    // $update_stmt->bind_param("sssssss", $email, $username, $password_hashed, $target_file, $level, 'NOW()', $id_users);
    $update_stmt = mysqli_query($con,$update_query);

    if ($update_query) {
        $_SESSION['username'] = $username;
        // $_SESSION['profile_image'] = $target_file; // Perbarui foto di navbar
        $feedback = "Profil berhasil diperbarui!";
        header("Location: ../../dashboard/users.php");
        exit;
    } else {
        $feedback = "Terjadi kesalahan, silakan coba lagi.";
    }
}

echo $feedback;
