<div class="container">
    <h1>Menu</h1>
    <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addMenuModal">Add Menu</button>

    <!-- Tampilkan alert jika ada -->
    <?php
    if (isset($_SESSION['notif'])) {
        echo '<div id="alert-message" class="alert alert-warning alert-dismissible fade show">' . $_SESSION['notif'] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        unset($_SESSION['notif']); // Hapus session alert setelah ditampilkan
    }
    ?>
    <table id="menuTable" class="table table-bordered table-striped table-hover">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Produk</th>
                <th>Deskripsi Produk</th>
                <th>Harga</th>
                <th>Foto Produk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo ++$no; ?></td>
                        <td><?php echo $row["id_produk"]; ?></td>
                        <td><?php echo $row["nama_produk"]; ?></td>
                        <td><?php echo $row["deskripsi_produk"]; ?></td>
                        <td><?php echo $row["harga"]; ?></td>
                        <td><img src="../admin/img/<?php echo $row["foto_produk"]; ?>" alt="Foto" style="width: 100px; height: auto;"></td>
                        <td>
                            <!-- Tombol Edit -->
                            <button class="btn btn-warning btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#editMenuModal"
                                onclick="setEditModal(
                                        '<?php echo $row['id_produk']; ?>',
                                        '<?php echo $row['nama_produk']; ?>',
                                        '<?php echo $row['deskripsi_produk']; ?>',
                                        '<?php echo $row['harga']; ?>',
                                        '<?php echo $row['foto_produk']; ?>'
                                    )"><i class='bx bxs-edit-alt'></i></button>
                            <!-- Tombol Lihat -->
                            <button class="btn btn-info btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#viewMenuModal"
                                onclick="setViewModal(
                                        '<?php echo $row['id_produk']; ?>',
                                        '<?php echo $row['nama_produk']; ?>',
                                        '<?php echo $row['deskripsi_produk']; ?>',
                                        '<?php echo $row['harga']; ?>',
                                        '<?php echo $row['foto_produk']; ?>'
                                    )"><i class='bx bxs-show'></i></button>
                            <!-- Tombol Hapus -->
                            <a href="#" class="btn btn-danger btn-sm btn-delete"
                                data-idproduk="<?php echo $row['id_produk']; ?>"
                                data-url="../admin/procces/delete-menu.php?id_produk=<?php echo $row['id_produk']; ?>">
                                <i class='bx bx-trash'></i>
                            </a>

                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan=" 6">Tidak ada data
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>