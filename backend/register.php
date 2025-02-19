<?php
<<<<<<< HEAD
require('koneksi/koneksi.php');
session_start();

=======
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require('koneksi/koneksi.php');
session_start();

// fungsi untuk verifikasi email
function verify_email($email, $token, $user)
{
    //Load Composer's autoloader
    require '../vendor/autoload.php';

    $mail = new PHPMailer(true);

    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'safsartim@gmail.com';
    $mail->Password   = 'njukbevvwdzsexrf';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom('safsartim@gmail.com', 'Safsar');
    $mail->addAddress($email, $user); // Menggunakan nama pengguna sebagai nama penerima
    $mail->addReplyTo('no-reply@safsar.com', 'No Reply');

    //Content
    $mail->isHTML(true);

    // Email Template dengan pengganti variabel
    $mail_template = "
        <div style='font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;'>
            <div style='max-width: 600px; margin: auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);'>
                <div style='background-color: #ffe31a; color: white; text-align: center; padding: 20px;'>
                    <img src='http://localhost/safsar-web/img/kuning.svg' alt='Safsar Logo' style='max-height: 50px;'><br>
                    <h1 style='margin: 0;'>Safsar</h1>
                </div>
                <div style='padding: 20px; color: #333;'>
                    <p>Yth. <strong>$user</strong>,</p> <!-- Menggunakan variabel nama pengguna -->
                    <p>Terima kasih telah mendaftar di Safsar! Silakan verifikasi email Anda untuk melanjutkan proses dengan mengklik tombol di bawah ini:</p>
                    <div style='text-align: center; margin: 20px 0;'>
                        <a href='http://localhost/safsar-web/backend/verifikasi/verify-mail.php?token=$token' target='_blank' style='display: inline-block; background-color: #ffe31a; color: white; padding: 12px 25px; text-decoration: none; border-radius: 4px; font-size: 16px;'>Verifikasi Email Anda</a>
                    </div>
                    <p>Jika Anda tidak membuat akun ini, Anda dapat mengabaikan email ini.</p>
                    <p>Terima kasih,<br>Tim Safsar</p>
                </div>
                <div style='text-align: center; background-color: #f4f4f4; padding: 10px; font-size: 12px; color: #666;'>
                    &copy; 2024 Safsar. Semua hak dilindungi.
                </div>
            </div>
        </div>
    ";

    $mail->Subject = 'Verifikasi Email';
    $mail->Body    = $mail_template;

    // Mengirim email
    $mail->send();
    echo 'berhasil terkirim!!!';
}


>>>>>>> 68d6b83 (DONE)
/**
 * Fungsi untuk menghasilkan UID otomatis dengan format USER001, USER002, dst.
 */
function generateUID($con)
{
    // Query untuk mendapatkan UID terbesar yang ada di tabel
    $query = "SELECT MAX(id_users) as max_uid FROM users";
    $result = $con->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $maxUid = $row['max_uid'];

        if ($maxUid) {
            // Ambil angka dari UID terakhir (USER001 -> 1)
            $number = (int)substr($maxUid, 4);
            $newNumber = $number + 1; // Tambahkan 1
        } else {
            // Jika belum ada UID, mulai dari USER001
            $newNumber = 1;
        }

        // Format angka menjadi tiga digit, misalnya 1 -> 001
        return 'USER' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    } else {
        die("Error: " . $con->error);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = $_POST['txt_email'];
    $user = $_POST['txt_username'];
    $pass1 = $_POST['txt_password'];

<<<<<<< HEAD
=======
    //membuat token dengan md5
    $token = md5(rand());

>>>>>>> 68d6b83 (DONE)
    // Enkripsi password
    $encPass = password_hash($pass1, PASSWORD_DEFAULT);

    // Generate UID baru
    $uid = generateUID($con);

<<<<<<< HEAD
    // Query untuk menyimpan data pengguna
    $query = "INSERT INTO users (id_users, email, username, password, created_at, level) VALUES ('$uid', '$mail', '$user', '$encPass', NOW(), 'member')";

    if ($con->query($query)) {
        echo "
            <script>
                alert('Data akun berhasil tersimpan');
                window.location.href = '../login_form.php';
            </script>";
    } else {
        echo "Error: " . $con->error;
    }
=======
    // Mengecek agar user tidak mendaftarkan email yang sama
    $querySelect = "SELECT * FROM users WHERE email = '$mail'";
    $sql = mysqli_query($con, $querySelect);
    $result = mysqli_fetch_assoc($sql);

    if ($result) {
        $_SESSION['log'] = "email sudah tersedia !";
        echo json_encode([
            'status' => 'error',
            'message' => 'Email sudah terdaftar!'
        ]);
    } else {
        // Query untuk menyimpan data pengguna
        $query = "INSERT INTO users (id_users, email, username, password, created_at, level, profile_image, token, status) VALUES ('$uid', '$mail', '$user', '$encPass', NOW(), 'member', 'uploads/default.jpg', '$token', 'Belum Terverifikasi')";

        if ($con->query($query)) {
            verify_email($mail, $token, $user);
            echo json_encode([
                'status' => 'success',
                'message' => 'Registrasi berhasil, silakan verifikasi email!'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menyimpan data pengguna.'
            ]);
        }
    }
    exit;
>>>>>>> 68d6b83 (DONE)
}

$con->close();
