<?php
include '../backend/koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Email tujuan
    $to = 'kahlapendek@gmail.com'; // Email admin yang dituju
    $subject = "Pesan dari: $name";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $emailBody = "
        <h2>Pesan Baru dari Pengunjung</h2>
        <p><strong>Nama:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Pesan:</strong><br>$message</p>
    ";

    // Simpan ke database
    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";
    if (mysqli_query($con, $sql)) {
        if (mail($to, $subject, $emailBody, $headers)) {
            echo "<script>alert('Pesan berhasil dikirim!'); window.location.href='../dashboard/message.php';</script>";
        } else {
            echo "<script>alert('Pesan berhasil disimpan, tetapi gagal dikirim email.'); window.location.href='../dashboard/message.php';</script>";
        }
    } else {
        echo "<script>alert('Gagal menyimpan pesan ke database.'); window.location.href='../dashboard/message.php';</script>";
    }
} else {
    header('Location: ../dashboard/message.php');
}
