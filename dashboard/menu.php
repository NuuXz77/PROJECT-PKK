<?php
include '../backend/koneksi/koneksi.php';
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: ../login_form');
    exit();
}

$no = 0;

// echo $_SESSION['id_users'];
// die();

// Ambil data produk
$query = "SELECT * FROM produk";
$result = mysqli_query($con, $query);

function generateUID($con)
{
    // Query untuk mendapatkan UID terbesar yang ada di tabel
    $query = "SELECT MAX(id_produk) as max_uid FROM produk";
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
        return 'MN' . str_pad(
            $newNumber,
            3,
            '0',
            STR_PAD_LEFT
        );
    } else {
        die("Error: " . $con->error);
    }
}

// Proses edit data bosqu

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="../style/sidebar.css">
</head>

<style>
    .modal-dialog {
        width: 100%;
        /* Modal memenuhi layar penuh */
        margin: 0 auto;
        /* Pastikan modal tetap berada di tengah horizontal */
        height: 100vh;
        /* Modal memenuhi layar penuh secara vertikal */
        display: flex;
        justify-content: center;
        /* Konten di tengah horizontal */
        align-items: center;
        /* Konten di tengah vertikal */
    }

    .modal {
        width: 100%;
        justify-content: center;
        align-items: center;
        margin: auto;
    }

    .modal-content {
        width: 100%;
        max-height: 90vh;
        /* Jika terlalu panjang, tetap berada dalam viewport */
        overflow-y: auto;
        /* Berikan scrollbar jika konten melebihi viewport */
    }

    .modal-backdrop {
        background-color: transparent !important;
        /* Hilangkan warna latar */
    }

    .alert {
        width: 100%;
        /* Modal memenuhi layar penuh */
        margin: 0 auto;
        /* Modal memenuhi layar penuh secara vertikal */
        display: flex;
        justify-content: center;
        /* Konten di tengah horizontal */
        align-items: center;
        /* Konten di tengah vertikal */
    }
</style>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img">
            <img src="<?= htmlspecialchars($_SESSION['profile_image'] ?: 'https://via.placeholder.com/100') ?>" alt="Profile Picture">
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <?php include 'sidebar/sidebar.php'; ?>
        </nav>
    </div>
    <?php
    if ($_SESSION['level'] == 'member') {
    ?>
        <div class="container mt-4">
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
    <?php } else if ($_SESSION['level'] == 'admin') { ?>
        <div class="container">
            <h1>Hello ini admin</h1>
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
                <thead class="table-light">
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
                                        data-url="../admin/procces/delete-menu.php?id_users=<?php echo $row['id_produk']; ?>">
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

    <?php } ?>

    <div class="modal fade" id="pesanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="proses_transaksi.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pesan Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_users" value="<?= $_SESSION['id_users'] ?>">
                        <input type="hidden" id="produk_dibeli" name="produk_dibeli">
                        <input type="hidden" id="harga" name="harga">

                        <div class="mb-3">
                            <label for="nama_costumer" class="form-label">Nama Customer</label>
                            <input type="text" class="form-control" id="nama_costumer" name="nama_costumer" required>
                        </div>
                        <div class="mb-3">
                            <label for="banyak_beli" class="form-label">Jumlah Beli</label>
                            <input type="number" class="form-control" id="banyak_beli" name="banyak_beli" required>
                        </div>
                        <div class="mb-3">
                            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                            <select class="form-select" id="metode_pembayaran" name="metode_pembayaran" required>
                                <option value="COD">COD</option>
                                <option value="Bank/E-Wallet">Bank/E-Wallet</option>
                            </select>
                        </div>
                        <div class="mb-3" id="alamat_field" style="display: none;">
                            <label for="alamat_pengiriman" class="form-label">Alamat Pengiriman</label>
                            <textarea class="form-control" id="alamat_pengiriman" name="alamat_pengiriman"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="total_harga" class="form-label">Total Harga</label>
                            <input type="number" class="form-control" id="total_harga" name="total_harga" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('metode_pembayaran').addEventListener('change', function() {
            const alamatField = document.getElementById('alamat_field');
            if (this.value === 'COD') {
                alamatField.style.display = 'block';
            } else {
                alamatField.style.display = 'none';
            }
        });

        const pesanModal = document.getElementById('pesanModal');
        pesanModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const idProduk = button.getAttribute('data-idproduk');
            const namaProduk = button.getAttribute('data-namaproduk');
            const harga = button.getAttribute('data-harga');

            pesanModal.querySelector('#produk_dibeli').value = namaProduk;
            pesanModal.querySelector('#harga').value = harga;
            pesanModal.querySelector('#total_harga').value = harga;
        });
    </script>


    <!-- Modal Add Menu -->
    <div class="modal fade" id="addMenuModal" tabindex="-1" aria-labelledby="addMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formAdd" action="../admin/procces/edit-menu.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addMenuModalLabel">Add Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="id_produk" class="form-label">Kode Barang (Auto)</label>
                            <input type="text" value="<?php echo generateUID($con); ?>" class="form-control" id="id_produk" name="id_produk" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                            <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" required>
                        </div>
                        <div class="mb-3">
                            <label for="foto_produk" class="form-label">Foto Produk</label>
                            <input type="file" class="form-control" id="foto_produk" name="foto_produk" accept="image/*" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Menu -->
    <div class="modal fade" id="editMenuModal" tabindex="-1" aria-labelledby="editMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formEdit" action="../admin/procces/edit-menu.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editMenuModalLabel">Edit Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_id_produk" class="form-label">Kode Barang</label>
                            <input type="text" class="form-control" id="edit_id_produk" name="id_produk" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="edit_nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="edit_nama_produk" name="nama_produk" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_deskripsi_produk" class="form-label">Deskripsi Produk</label>
                            <textarea class="form-control" id="edit_deskripsi_produk" name="deskripsi_produk" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit_harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="edit_harga" name="harga" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_foto_produk" class="form-label">Foto Produk</label>
                            <input type="file" class="form-control" id="edit_foto_produk" name="foto_produk" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal View data -->
    <div class="modal fade" id="viewMenuModal" tabindex="-1" aria-labelledby="viewMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewMenuModalLabel">View Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Kode Barang:</strong> <span id="view_id_produk"></span></p>
                    <p><strong>Nama Produk:</strong> <span id="view_nama_produk"></span></p>
                    <p><strong>Deskripsi Produk:</strong> <span id="view_deskripsi_produk"></span></p>
                    <p><strong>Harga:</strong> <span id="view_harga"></span></p>
                    <p><strong>Foto Produk:</strong></p>
                    <img id="view_foto_produk" src="" alt="Foto User" style="width: 100%; height: auto;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <script>
        document.querySelectorAll('[data-bs-toggle="modal"]').forEach(button => {
            button.addEventListener('click', function() {
                const idProduk = this.getAttribute('data-idproduk');
                const namaProduk = this.getAttribute('data-namaproduk');
                const harga = this.getAttribute('data-harga');

                document.getElementById('id_produk').value = idProduk;
                document.getElementById('produk_dibeli').value = namaProduk;
                document.getElementById('harga').value = harga;

                const banyakBeliInput = document.getElementById('banyak_beli');
                const totalHargaInput = document.getElementById('total_harga');

                banyakBeliInput.addEventListener('input', function() {
                    const total = this.value * harga;
                    totalHargaInput.value = total || 0;
                });
            });
        });


        function setEditModal(id, nama, deskripsi, harga, foto) {
            document.getElementById('edit_id_produk').value = id;
            document.getElementById('edit_nama_produk').value = nama;
            document.getElementById('edit_deskripsi_produk').value = deskripsi;
            document.getElementById('edit_harga').value = harga;
        }

        function setViewModal(id, nama, deskripsi, harga, foto) {
            document.getElementById('view_id_produk').textContent = id;
            document.getElementById('view_nama_produk').textContent = nama;
            document.getElementById('view_deskripsi_produk').textContent = deskripsi;
            document.getElementById('view_harga').textContent = harga;
            document.getElementById('view_foto_produk').src = '../admin/img/' + foto;
        }

        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault(); // Mencegah default action dari <a>

                const idProduk = this.getAttribute('data-idproduk');
                const deleteUrl = this.getAttribute('data-url');

                // SweetAlert untuk konfirmasi
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: `Data dengan ID ${idProduk} akan dihapus!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ffc107', // Warna kuning
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika user mengkonfirmasi, redirect ke URL delete
                        window.location.href = deleteUrl;
                    }
                });
            });
        });

        $(document).ready(function() {
            $('#menuTable').DataTable({
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data per halaman",
                    zeroRecords: "Tidak ada data yang ditemukan",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    infoEmpty: "Tidak ada data",
                    infoFiltered: "(difilter dari _MAX_ total data)"
                }
            });
        });

        // Fungsi untuk mengirim data ke `edit-menu.php`
        // function editData(dataForm) {
        //     $.ajax({
        //         url: '../admin/procces/edit-menu.php', // File proses
        //         type: 'POST',
        //         data: dataForm, // Data yang dikirim
        //         success: function(response) {
        //             // Tampilkan SweetAlert berdasarkan respons
        //             Swal.fire({
        //                 icon: 'success',
        //                 title: 'Berhasil!',
        //                 text: 'Edit Menu Berhasil',
        //                 confirmButtonColor: '#ffc107'
        //             }).then(() => {
        //                 window.location.reload(); // Refresh otomatis halaman setelah sukses
        //             });
        //         },
        //         error: function() {
        //             // Tampilkan SweetAlert untuk error
        //             Swal.fire({
        //                 icon: 'error',
        //                 title: 'Gagal!',
        //                 text: 'Terjadi kesalahan.',
        //                 confirmButtonColor: '#dc3545'
        //             });
        //         }
        //     });
        // }
        // // Contoh penggunaan fungsi
        // // Panggil ini saat form di-submit
        // $('#formEdit').on('submit', function(e) {
        //     e.preventDefault(); // Mencegah reload halaman
        //     const formData = $(this).serialize(); // Ambil data form
        //     editData(formData); // Kirim data ke edit-menu.php
        // });

        $(document).ready(function() {
            function addData(dataForm) {
                $.ajax({
                    url: '../admin/procces/add-menu.php', // Pastikan URL benar
                    type: 'POST',
                    data: dataForm,
                    processData: false, // Jangan proses data FormData
                    contentType: false, // Jangan tetapkan jenis konten secara manual
                    success: function(response) {
                        // Debug respons
                        console.log(response);

                        // Tampilkan SweetAlert berdasarkan respons
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Menu berhasil ditambahkan!',
                            confirmButtonColor: '#ffc107'
                        }).then(() => {
                            window.location.reload(); // Refresh halaman setelah sukses
                        });
                    },
                    error: function(xhr, status, error) {
                        // Debug error
                        console.error(xhr.responseText);

                        // Tampilkan SweetAlert untuk error
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat menambahkan menu.',
                            confirmButtonColor: '#dc3545'
                        });
                    }
                });
            }

            // Event listener untuk submit form
            $('#formAdd').on('submit', function(e) {
                e.preventDefault(); // Mencegah reload halaman

                // Ambil data dari form
                const formData = new FormData(this); // Buat FormData dari elemen form
                addData(formData); // Kirim data ke add-menu.php
            });
        });

        setTimeout(function() {
            const alertMessage = document.getElementById('alert-message');
            if (alertMessage) {
                alertMessage.style.display = 'none';
            }
        }, 5000);
    </script>
</body>

</html>