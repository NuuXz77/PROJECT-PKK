<div class="container mt-5">
    <h1 class="text-center">Message</h1>
    <div class="row mt-4">
        <!-- Kontak Informasi -->
        <div class="col-md-6">
            <h3>Informasi Kontak</h3>
            <p><strong>Alamat:</strong> Jl. Cikoneng</p>
            <p><strong>Telepon:</strong> +62 838 2596 3195</p>
            <p><strong>Email:</strong> <a href="mailto:safsar@gmail.com">safsar@gmail.com</a></p>
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