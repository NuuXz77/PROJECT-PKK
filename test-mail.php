<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
    $mail->isSMTP(); //Send using SMTP
    $mail->Host       = 'smtp.gmail.com'; //Set the SMTP server to send through
    $mail->SMTPAuth   = true; //Enable SMTP authentication
    $mail->Username   = 'safsartim@gmail.com'; //SMTP username
    $mail->Password   = 'njukbevvwdzsexrf'; //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable implicit TLS encryption
    $mail->Port       = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('safsartim@gmail.com', 'Safsar');
    $mail->addAddress('stokepep3619@gmail.com', 'User'); //Add a recipient
    $mail->addReplyTo('no-reply@safsar.com', 'No Reply');

    //Content
    $mail->isHTML(true); //Set email format to HTML

    // Email Template
    $mail_template = "
        <div style='font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;'>
            <div style='max-width: 600px; margin: auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);'>
                <div style='background-color: #ffe31a; color: white; text-align: center; padding: 20px;'>
                    <img src='https://example.com/logo.png' alt='Safsar Logo' style='max-height: 50px;'><br>
                    <h1 style='margin: 0;'>Safsar</h1>
                </div>
                <div style='padding: 20px; color: #333;'>
                    <p>Yth. <strong>[Nama Pengguna]</strong>,</p>
                    <p>Terima kasih telah mendaftar di Safsar! Silakan verifikasi email Anda untuk melanjutkan proses dengan mengklik tombol di bawah ini:</p>
                    <div style='text-align: center; margin: 20px 0;'>
                        <a href='[Tautan Verifikasi]' target='_blank' style='display: inline-block; background-color: #ffe31a; color: white; padding: 12px 25px; text-decoration: none; border-radius: 4px; font-size: 16px;'>Verifikasi Email Anda</a>
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

    $mail->send();
    echo 'berhasil terkirim!!!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
