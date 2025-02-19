<?php
include '../backend/koneksi/koneksi.php';
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: ../login_form.php');
<<<<<<< HEAD
}
=======
    exit;
}

if ($_SESSION['level'] == 'admin') {
    $query = "SELECT * FROM transaksi;";
} else {
    $id_akun = $_SESSION['id_users'];
    $query = "SELECT * FROM transaksi WHERE id_user = '$id_akun'";
}
$result = mysqli_query($con, $query);
>>>>>>> 68d6b83 (DONE)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../style/sidebar.css">
=======
    <title>Transaksi</title>
    <?php
    include '../modular/library.php';
    include '../modular/icon.php';
    ?>

    <!-- Tambahkan Kustom Styling -->
    <style>
        :root {
            --primary-color: #ffe31a;
            --hover-color: #d4bc00;
        }

        /* DataTables Styling */
        #transaksiTable {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            overflow-y: scroll;
            max-height: 400px;

        }

        #transaksiTable thead {
            background-color: #000;
            color: #000;
        }

        #transaksiTable th,
        #transaksiTable td {
            padding: 15px;
            text-align: left;
        }

        #transaksiTable tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        /* Button styling for the action column */
        .table-action {
            cursor: pointer;
            color: #000;
        }

        .table-action:hover {
            color: #000;
        }

        tbody {
            overflow-y: scroll;
        }

        /* Modal Styling */
        .modal-header {
            background-color: #f8f9fa;
        }

        .modal-footer {
            background-color: #f8f9fa;
        }

        .modal-body p {
            font-size: 14px;
        }

        .modal-title {
            font-weight: bold;
        }

        .btn-print,
        .btn-back {
            padding: 8px 15px;
            font-size: 14px;
        }

        .btn-print {
            background-color: #28a745;
            color: #fff;
        }

        .btn-back {
            background-color: #6c757d;
            color: #fff;
        }

        .btn-print:hover {
            background-color: #218838;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }

        .dataTables_filter {
            float: right;
        }

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
    </style>
>>>>>>> 68d6b83 (DONE)
</head>

<body id="body-pd">
    <header class="header sisi" id="header">
<<<<<<< HEAD
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar sisi" id="nav-bar">
        <nav class="nav">
            <?php include 'sidebar/sidebar.php' ?>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <div id="profile">
            <h1>Transaksi</h1>
=======
        <div class="header_toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <div class="header_img">
            <img src="<?= htmlspecialchars($_SESSION['profile_image'] ?: 'https://via.placeholder.com/100') ?>" alt="Profile Picture">
        </div>
    </header>
    <div class="l-navbar sisi" id="nav-bar">
        <nav class="nav">
            <?php include 'sidebar/sidebar.php'; ?>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100">
        <div class="container mt-5">
            <h1 class="mb-4">Transaksi</h1>
            <table id="transaksiTable" class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Nama Costumer</th>
                        <th>Produk</th>
                        <th>Total Harga</th>
                        <th>Status Pembayaran</th>
                        <th>Metode Pembayaran</th>
                        <th>Alamat Pengiriman</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id_transaksi']) ?></td>
                            <td><?= htmlspecialchars($row['nama_costumer']) ?></td>
                            <td><?= htmlspecialchars($row['produk_dibeli']) ?></td>
                            <td>Rp <?= number_format($row['total_harga'], 0, ',', '.') ?></td>
                            <td>
                                <?php if ($row['status_pembayaran'] === 'Ditolak') { ?>
                                    <span class="btn btn-danger">Ditolak</span>
                                <?php } elseif ($row['status_pembayaran'] === 'Berhasil') { ?>
                                    <span class="btn btn-success">Berhasil</span>
                                <?php } else { ?>
                                    <span class="btn btn-warning"><?= htmlspecialchars($row['status_pembayaran']) ?></span>
                                <?php } ?>
                            </td>
                            <td><?= htmlspecialchars($row['metode_pembayaran'] ?: '-') ?></td>
                            <td><?= htmlspecialchars($row['alamat_pengiriman'] ?: '-') ?></td>
                            <td>
                                <?php if ($_SESSION['level'] == 'admin') { ?>
                                    <?php if ($row['status_pembayaran'] === 'Pending') { ?>
                                        <form action="konfirmasi_pembayaran.php" method="POST" style="display: inline-block;">
                                            <input type="hidden" name="id_transaksi" value="<?= $row['id_transaksi'] ?>">
                                            <button class="btn btn-primary btn-sm" type="submit" name="aksi" value="konfirmasi">Konfirmasi</button>
                                            <button class="btn btn-danger btn-sm" type="submit" name="aksi" value="tolak" onclick="return confirm('Yakin ingin menolak?')">Tolak</button>
                                        </form>
                                    <?php } ?>
                                <?php } else if ($_SESSION['level'] == 'member') { ?>
                                    <button class="btn btn-warning">
                                        <i class="bx bx-show-alt table-action" data-bs-toggle="modal" data-bs-target="#modalTransaksi<?= $row['id_transaksi'] ?>"></i>
                                    </button>
                                    <?php if ($row['status_pembayaran'] === 'Ditolak') { ?>
                                        <button
                                            class="btn btn-primary btn-bayar-ulang"
                                            data-bs-toggle="modal"
                                            data-bs-target="#bayarUlangModal"
                                            data-idtransaksi="<?= $row['id_transaksi'] ?>"
                                            data-produk="<?= $row['produk_dibeli'] ?>"
                                            data-totalharga="<?= $row['total_harga'] ?>">
                                            Bayar Ulang
                                        </button>

                                    <?php } ?>
                                <?php } ?>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="modalTransaksi<?= $row['id_transaksi'] ?>" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">Ubah Status Pembayaran</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="update_transaksi.php" method="POST">
                                        <div class="modal-body">
                                            <input type="hidden" name="id_transaksi" value="<?= htmlspecialchars($row['id_transaksi']) ?>">
                                            <p><strong>Nama Costumer:</strong> <?= htmlspecialchars($row['nama_costumer']) ?></p>
                                            <p><strong>Produk Dibeli:</strong> <?= htmlspecialchars($row['produk_dibeli']) ?></p>
                                            <p><strong>Total Harga:</strong> Rp <?= number_format($row['total_harga'], 0, ',', '.') ?></p>
                                            <p><strong>Status Pembayaran:</strong> <?= htmlspecialchars($row['status_pembayaran']) ?></p>
                                            <p><strong>Metode Pembayaran:</strong> <?= htmlspecialchars($row['metode_pembayaran']) ?></p>
                                            <p><strong>Alamat:</strong> <?= htmlspecialchars($row['alamat_pengiriman']) ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="modal-footer">
                                                <!-- Tombol Cetak -->
                                                <a href="struk_transaksi.php?id=<?= $row['id_transaksi'] ?>" class="btn btn-primary" target="_blank">Cetak</a>

                                                <!-- Tombol Batal -->
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </tbody>

            </table>
>>>>>>> 68d6b83 (DONE)
        </div>
    </div>
    <!--Container Main end-->

<<<<<<< HEAD
    <!-- <script src="../js/sidebar.js"> -->

=======
    <!-- Modal Pembayaran Ulang -->
    <div class="modal fade" id="bayarUlangModal" tabindex="-1" aria-labelledby="bayarUlangModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="proses_pembayaran_ulang.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bayarUlangModalLabel">Bayar Ulang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- ID Transaksi -->
                        <input type="hidden" name="id_transaksi" id="id_transaksi">

                        <!-- Produk -->
                        <p><strong>Produk:</strong> <span id="produk"></span></p>

                        <!-- Total Harga -->
                        <p><strong>Total Harga:</strong> Rp <span id="total_harga"></span></p>

                        <!-- Metode Pembayaran -->
                        <div class="mb-3">
                            <label for="metode_pembayaran" class="form-label">Metode Pembayaran:</label>
                            <select class="form-select" name="metode_pembayaran" id="metode_pembayaran" required>
                                <option value="Bank/E-Wallet">Bank/E-Wallet</option>
                                <option value="cod">COD</option>
                            </select>
                        </div>

                        <!-- Alamat untuk COD -->
                        <div class="mb-3" id="alamatGroup" style="display: none;">
                            <label for="alamat" class="form-label">Alamat (untuk COD):</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat">
                        </div>

                        <!-- Uang Bayar untuk Bank/E-Wallet -->
                        <div class="mb-3" id="uangBayarGroup" style="display: none;">
                            <label for="uang_bayar" class="form-label">Uang Bayar:</label>
                            <input type="number" class="form-control" name="uang_bayar" id="uang_bayar" placeholder="Masukkan jumlah uang bayar">
                        </div>

                        <!-- Uang Kembali -->
                        <div class="mb-3" id="uangKembaliGroup" style="display: none;">
                            <label for="uang_kembali" class="form-label">Uang Kembali:</label>
                            <input type="text" class="form-control" id="uang_kembali" disabled>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Kirim Pembayaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            function pesanMen(formData) {
                // Tampilkan loading
                $('#loading').show();

                $.ajax({
                    url: 'backend/login.php', // Pastikan URL benar
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Sembunyikan loading
                        $('#loading').hide();

                        // Debug respons
                        console.log("Respons dari server:", response);

                        // // Tampilkan SweetAlert berdasarkan respons
                        // Swal.fire({
                        //     icon: 'success',
                        //     title: 'Berhasil!',
                        //     text: 'Login berhasil !',
                        //     confirmButtonColor: '#ffe31a'
                        // }).then(() => {
                        //     window.location.href = 'dashboard/dashboard.php'; // Pindah ke halaman login setelah sukses
                        // });
                    },
                    error: function(xhr, status, error) {
                        // Sembunyikan loading
                        $('#loading').hide();

                        // Debug error
                        console.error("Error:", xhr.responseText);

                        // Tampilkan SweetAlert untuk error
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat menambahkan akun.',
                            confirmButtonColor: '#dc3545'
                        });
                    }
                });
            }


            // Event Handler untuk Submit Form
            $('#loginForm').on('submit', function(e) {
                e.preventDefault(); // Mencegah reload halaman
                const formData = new FormData(this); // Buat FormData dari elemen form
                pesanMen(formData); // Kirim data ke server
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Selector untuk tombol bayar ulang
            const bayarUlangButtons = document.querySelectorAll('.btn-bayar-ulang');

            // Tambahkan event listener ke setiap tombol
            bayarUlangButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Ambil data dari tombol
                    const idTransaksi = this.getAttribute('data-idtransaksi');
                    const produk = this.getAttribute('data-produk');
                    const totalHarga = this.getAttribute('data-totalharga');

                    // Masukkan data ke dalam modal
                    document.getElementById('id_transaksi').value = idTransaksi;
                    document.getElementById('produk').textContent = produk;
                    document.getElementById('total_harga').textContent = parseInt(totalHarga).toLocaleString('id-ID');
                });
            });

            // Selector untuk elemen modal
            const metodePembayaranSelect = document.getElementById('metode_pembayaran');
            const alamatGroup = document.getElementById('alamatGroup');
            const uangBayarGroup = document.getElementById('uangBayarGroup');
            const uangKembaliGroup = document.getElementById('uangKembaliGroup');
            const uangBayarInput = document.getElementById('uang_bayar');
            const uangKembaliInput = document.getElementById('uang_kembali');
            const totalHargaText = document.getElementById('total_harga');

            // Tampilkan input berdasarkan metode pembayaran
            metodePembayaranSelect.addEventListener('change', function() {
                if (this.value === 'cod') {
                    alamatGroup.style.display = 'block';
                    uangBayarGroup.style.display = 'none';
                    uangKembaliGroup.style.display = 'none';
                } else {
                    alamatGroup.style.display = 'none';
                    uangBayarGroup.style.display = 'block';
                    uangKembaliGroup.style.display = 'block';
                }
            });

            // Hitung uang kembali saat uang bayar diisi
            uangBayarInput.addEventListener('input', function() {
                const totalHarga = parseInt(totalHargaText.textContent.replace(/[^0-9]/g, '')) || 0;
                const uangBayar = parseInt(uangBayarInput.value) || 0;
                const uangKembali = uangBayar - totalHarga;

                // Tampilkan uang kembali jika lebih dari atau sama dengan 0
                if (uangKembali >= 0) {
                    uangKembaliInput.value = `Rp ${uangKembali.toLocaleString('id-ID')}`;
                } else {
                    uangKembaliInput.value = 'Uang bayar kurang!';
                }
            });
        });



        $(document).ready(function() {
            $('#transaksiTable').DataTable({
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

        function toggleAlamat(selectElement, id) {
            const alamatForm = document.getElementById(`alamatForm${id}`);
            if (selectElement.value === 'COD') {
                alamatForm.style.display = 'block';
            } else {
                alamatForm.style.display = 'none';
            }
        }
>>>>>>> 68d6b83 (DONE)
    </script>
</body>

</html>