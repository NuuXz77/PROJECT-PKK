<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login your account</title>
    <link rel="stylesheet" href="style/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .swal2-confirm {
            background-color: #ffe31a !important;
            /* Warna kuning */
            color: #000 !important;
            /* Warna teks hitam */
            border: none;
            transition: all 0.2s ease-in-out;
        }

        .swal2-confirm:hover {
            background-color: #d4bc00 !important;
            /* Warna kuning lebih gelap saat hover */
            color: #fff !important;
        }
    </style>
</head>

<body>
    <main>
        <section>
            <div class="full">
                <div class="kiri">
                    <div class="isi">
                        <h1>Memiliki Akun?</h1>
                        <p>Jika sudah memiliki akun silahkan Masuk</p>
                        <a href="login_form.php">Masuk!</a>
                    </div>
                </div>
                <div class="kanan">
                    <form method="post" action="backend/register.php" onsubmit="return validasiPassword()">
                        <div class="img">
                            <img src="img/ilusi.svg" alt="" width="180px">
                        </div>
                        <h1>Masukan Data</h1>
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input name="txt_email" type="email" placeholder="Email" required>
                        </div>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input name="txt_username" type="text" placeholder="Username" required>
                        </div>
                        <div class="password-field">
                            <i class="fas fa-lock"></i>
                            <input name="txt_password" type="password" id="password" placeholder="Password" required>
                            <span class="toggle-password" id="togglePassword"><i class="fas fa-eye"></i></span>
                        </div>
                        <div class="password-field">
                            <i class="fas fa-check-circle"></i>
                            <input id="confirm_password" type="password" placeholder="Confirm Password" required>
                        </div>
                        <div class="fl">
                            <a href="">Lupa Kata Sandi?</a>
                            <button type="submit">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script>
        document.getElementById("togglePassword").addEventListener("mousedown", function() {
            const passwordField = document.getElementById("password");
            const icon = this.querySelector("i");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        });

        document.getElementById("togglePassword").addEventListener("mouseup", function() {
            const passwordField = document.getElementById("password");
            const icon = this.querySelector("i");

            if (passwordField.type !== "password") {
                passwordField.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        });

        function validasiPassword() {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirm_password").value;

            if (password !== confirmPassword) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Password dan Konfirmasi Password tidak sama!',
                    confirmButtonText: 'Coba Lagi',
                    customClass: {
                        confirmButton: 'swal2-confirm' // Terapkan kelas khusus untuk tombol
                    }
                });
                return false;
            }

            // Jika password cocok
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Password valid!',
                timer: 2000,
                showConfirmButton: false
            });

            return true;
        }
    </script>
</body>

</html>