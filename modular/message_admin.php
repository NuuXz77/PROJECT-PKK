<div class="container">
    <h1>Data Pesan Yang Dikirim Dari Users</h1>
    <button class="btn btn-primary mb-4" onclick="window.open('cetak_laporan.php', '_blank')">Cetak Laporan</button>

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
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Kode User</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo ++$no; ?></td>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["message"]; ?></td>
                        <td><?php echo $row["created_at"]; ?></td>
                        <td>
                            <!-- Tombol Lihat -->
                            <button class="btn btn-info btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#viewPesan"
                                onclick="setViewPesan(
                                        '<?php echo $row['id']; ?>',
                                        '<?php echo $row['name']; ?>',
                                        '<?php echo $row['email']; ?>',
                                        '<?php echo $row['message']; ?>',
                                        '<?php echo $row['created_at']; ?>'
                                    )"><i class='bx bxs-show'></i></button>
                            <!-- Tombol Hapus -->
                            <a href="#" class="btn btn-danger btn-sm btn-delete"
                                data-idproduk="<?php echo $row['id']; ?>"
                                data-url="../admin/procces/delete-menu.php?id_users=<?php echo $row['id']; ?>">
                                <i class='bx bx-trash'></i>
                            </a>

                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Tidak ada data
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


<div class="modal fade" id="viewPesan" tabindex="-1" aria-labelledby="viewPesanlabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewPesanlabel">Pesan Dari <span id="view_nama"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Kode User:</strong> <span id="view_id"></span></p>
                <p><strong>Email:</strong> <span id="view_email"></span></p>
                <p><strong>Pesan:</strong> <span id="view_pesan"></span></p>
                <p><strong>Tanggal:</strong> <span id="view_tanggal"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>