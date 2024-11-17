<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login your account</title>
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <main>
        <section>
            <div class="full">
                <div class="kiri">
                    <form method="post" action="backend/login.php">
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
                            <a href="">Lupa Kata Sandi ?</a>
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
    </script>
</body>

</html>