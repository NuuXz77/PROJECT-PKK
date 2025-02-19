<div class="container mt-4">
    <h1>Menu Tersedia</h1>
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="../admin/img/<?= htmlspecialchars($row['foto_produk']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['nama_produk']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($row['nama_produk']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($row['deskripsi_produk']) ?></p>
                        <p class="card-text"><strong>Rp <?= number_format($row['harga'], 0, ',', '.') ?></strong></p>
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#pesanModal"
                            data-idproduk="<?= $row['id_produk'] ?>"
                            data-namaproduk="<?= $row['nama_produk'] ?>"
                            data-harga="<?= $row['harga'] ?>">
                            Pesan Sekarang
                        </button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>