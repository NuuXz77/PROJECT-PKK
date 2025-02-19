<?php
include '../backend/koneksi/koneksi.php';
session_start();

function generateUID($con)
{
    // Query untuk mendapatkan UID terbesar yang ada di tabel
    $query = "SELECT MAX(id) as max_uid FROM messages";
    $result = $con->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $maxUid = $row['max_uid'];

        if ($maxUid) {
            // Ambil angka dari UID terakhir (TRX001 -> 1)
            $number = (int)substr($maxUid, 4);
            $newNumber = $number + 1; // Tambahkan 1
        } else {
            // Jika belum ada UID, mulai dari TRX001
            $newNumber = 1;
        }

        // Format angka menjadi tiga digit, misalnya 1 -> 001
        return 'PS' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    } else {
        die("Error: " . $con->error);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $id_akun = $_SESSION['id_users'];
    $id = generateUID($con);
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
    $sql = "INSERT INTO messages (id, name, email, message, id_akun) VALUES ('$id','$name', '$email', '$message', '$id_akun')";
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
