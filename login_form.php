<?php
<<<<<<< HEAD

=======
session_start();

if (isset($_SESSION['email'])) {
    header('Location: dashboard/dashboard.php');
}
>>>>>>> 68d6b83 (DONE)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Login your account</title>
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
=======
    <title>Login Akun</title>
    <!-- <link rel="stylesheet" href="style/login.css"> -->
    <?php
    include 'modular/icon.php';
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        * {
            font-family: "Poppins", sans-serif;
            margin: 0;
            padding: 0;
            font-size: 16px;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            width: 100%;
        }

        :root {
            font-size: 10px;
            --primary-color: #ffe31a;
            --hover-color: #d4bc00;
        }

        .full {
            display: flex;
            justify-content: center;
            /* background-color: var(--primary-color); */
            align-items: center;
            height: 100vh;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.05);
            width: 100%;
        }

        .full .kiri,
        .full .kanan {
            width: 50%;
            height: 100vh;
            display: flex;
            margin: auto;
            justify-content: center;
            align-items: center;
            font-size: 2rem;
            color: #000;
        }

        .full .kiri {
            background-image: url("../img/cover_login.svg");
            background-size: cover;
            text-align: center;
            border-radius: 10px;
            max-width: 1200px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            width: 30%;
            height: auto;
            padding: 3rem 0rem;
        }

        .full .kiri h1 {
            font-size: 2.8rem;
            margin-bottom: 2rem;
            font-weight: 300;
        }

        .input-field,
        .password-field {
            position: relative;
            margin: 8px 0;
            width: 100%;
        }

        .input-field i,
        .password-field i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.5rem;
            color: #000;
        }

        .input-field input,
        .password-field input {
            width: 100%;
            padding: 1rem 4rem 1rem 3.5rem;
            font-size: 1.3rem;
            outline: 1px solid #000;
            box-sizing: border-box;
        }

        .password-field .toggle-password {
            position: absolute;
            right: 4rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.5rem;
            color: #000;
            cursor: pointer;
        }

        .password-field .toggle-password:hover {
            color: #333;
        }

        .full .kiri .fl {
            width: auto;
            height: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
        }

        .full .kiri .fl a {
            text-decoration: none;
            color: #000;
        }

        .full .kiri .fl button {
            width: 48%;
            padding: 1rem;
            font-size: 1.3rem;
            background-color: var(--primary-color);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .full .kiri .fl button:hover {
            background-color: var(--hover-color);
        }

        .full p,
        a {
            margin-top: 1rem;
            font-size: 1.3rem;
            text-decoration: none;
            color: #000;
            transition: all 0.1s ease-in-out;
        }

        .full a:hover {
            text-decoration: underline;
            color: var(--hover-color);
        }

        .full .kanan {
            background-size: cover;
            text-align: center;
            margin: auto;
        }

        .full .kanan .isi {
            margin: 5rem;
        }

        .full .kanan .isi h1,
        .full .kanan .isi p,
        .full .kanan .isi button {
            margin-bottom: 2rem;
        }

        .full .kanan .isi h1 {
            font-size: 3rem;
        }

        .full .kanan .isi a {
            padding: 1rem 5rem 1rem 5rem;
            text-decoration: none;
            color: #000;
            border-radius: 5px;
            background-color: #fff;
            border: none;
            box-shadow: 2px 2px 10px 0px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .full .kanan .isi a:hover {
            background-color: var(--primary-color);
        }

        #loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* Latar belakang semi-transparan */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .spinner {
            border: 8px solid #f3f3f3;
            /* Warna abu-abu lembut */
            border-top: 8px solid #ffe31a;
            /* Warna kuning (SweetAlert) */
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
        }

        #loading p {
            color: #ffe31a;
            /* Warna teks kuning */
            margin-top: 10px;
            font-size: 16px;
            font-family: Arial, sans-serif;
            font-weight: bold;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Media Query untuk layar kecil */
        @media screen and (max-width: 768px) {
            .full {
                /* margin: auto; */
                justify-content: center;
                display: flex;
                align-items: center;
                width: 100%;
                /* background-color: #d4bc00; */
            }

            .full .kiri {
                width: 50%;
                /* background-color: #333; */
                align-items: center;
                justify-content: center;
            }

            .full .kanan {
                display: none;
                width: 0%;
            }
        }

        /* Media Query untuk layar sedang */
        @media screen and (min-width: 769px) and (max-width: 1024px) {}
    </style>
>>>>>>> 68d6b83 (DONE)
</head>

<body>
    <main>
        <section>
<<<<<<< HEAD
            <div class="full">
                <div class="kiri">
                    <form method="post" action="backend/login.php">
=======
            <div id="loading" style="display: none;">
                <div class="spinner"></div>
                <!-- <p>Memproses, harap tunggu...</p> -->
            </div>
            <?php
            if (isset($_SESSION['status'])) {
                $message = explode(', ', $_SESSION['status']);

                echo "
                        <script>
                            Swal.fire({
                                icon: '$message[0]',
                                title: '$message[1]!',
                                text: '$message[2]',
                                confirmButtonColor: '$message[3]'
                            });
                        </script>
                    ";
                session_unset(); // Hapus session setelah digunakan
            }
            ?>

            <div class="full">
                <div class="kiri">
                    <form id="loginForm" method="post" action="backend/login.php">
>>>>>>> 68d6b83 (DONE)
                        <img src="img/kuning.svg" alt="" width="100px">
                        <h1>LOGIN</h1>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input name="txt_email" type="email" placeholder="Email" required>
                        </div>
                        <div class="password-field">
                            <i class="fas fa-lock"></i>
                            <input id="txt_password" type="password" name="txt_password" placeholder="Password" required>
                            <span class="toggle-password" id="togglePassword"><i class="fas fa-eye"></i></span>
                        </div>
                        <div class="fl">
<<<<<<< HEAD
                            <a href="">Lupa Kata Sandi ?</a>
=======
                            <a href="https://wa.me/62895361858050?text=Halo,%20saya%20membutuhkan%20bantuan%20untuk%20memulihkan%20kata%20sandi%20akun%20saya" target="_blank">
                                Lupa Password ?
                            </a>
>>>>>>> 68d6b83 (DONE)
                            <button>Masuk</button>
                        </div>
                        <p>Belum memiliki akun ? Klik <a href="register_form.php">Disini</a></p>
                    </form>
                </div>
                <div class="kanan">
                    <div class="isi">
                        <div class="img">
                            <img src="img/ilusi.svg" alt="" width="400px">
                        </div>
                        <!-- <h1>Buat Akun ?</h1>
                        <p>buat akun jika Anda belum memiliki akun</p>
                        <a href="register_form.php">Daftar !</a> -->
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        document.getElementById("togglePassword").addEventListener("mousedown", function() {
            const passwordField = document.getElementById("txt_password");
            const icon = this.querySelector("i");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        });
        document.getElementById("togglePassword").addEventListener("mouseup", function() {
            const passwordField = document.getElementById("txt_password");
            const icon = this.querySelector("i");

            if (passwordField.type !== "password") {
                passwordField.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        });
<<<<<<< HEAD
=======

        // $(document).ready(function() {
        //     function loginData(formData) {
        //         // Tampilkan loading
        //         $('#loading').show();

        //         $.ajax({
        //             url: 'backend/login.php', // Pastikan URL benar
        //             type: 'POST',
        //             data: formData,
        //             processData: false,
        //             contentType: false,
        //             success: function(response) {
        //                 // Sembunyikan loading
        //                 $('#loading').hide();

        //                 // Debug respons
        //                 console.log("Respons dari server:", response);

        //                 // // Tampilkan SweetAlert berdasarkan respons
        //                 // Swal.fire({
        //                 //     icon: 'success',
        //                 //     title: 'Berhasil!',
        //                 //     text: 'Login berhasil !',
        //                 //     confirmButtonColor: '#ffe31a'
        //                 // }).then(() => {
        //                 //     window.location.href = 'dashboard/dashboard.php'; // Pindah ke halaman login setelah sukses
        //                 // });
        //             },
        //             error: function(xhr, status, error) {
        //                 // Sembunyikan loading
        //                 $('#loading').hide();

        //                 // Debug error
        //                 console.error("Error:", xhr.responseText);

        //                 // Tampilkan SweetAlert untuk error
        //                 Swal.fire({
        //                     icon: 'error',
        //                     title: 'Gagal!',
        //                     text: 'Terjadi kesalahan saat menambahkan akun.',
        //                     confirmButtonColor: '#dc3545'
        //                 });
        //             }
        //         });
        //     }


        //     // Event Handler untuk Submit Form
        //     $('#loginForm').on('submit', function(e) {
        //         e.preventDefault(); // Mencegah reload halaman
        //         const formData = new FormData(this); // Buat FormData dari elemen form
        //         loginData(formData); // Kirim data ke server
        //     });
        // });
>>>>>>> 68d6b83 (DONE)
    </script>
</body>

</html>