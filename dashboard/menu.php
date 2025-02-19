<?php
include '../backend/koneksi/koneksi.php';
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: ../login_form');
<<<<<<< HEAD
}
=======
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
        return 'MN' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    } else {
        die("Error: " . $con->error);
    }
}

// var_dump(generateUID($con));
// die();
// Proses edit data bosqu

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
</head>

<body id="body-pd">
    <header class="header sisi" id="header">
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
        <div id="menu">
            <h1>menu</h1>
        </div>
    </div>
    <!--Container Main end-->

    <!-- <script src="../js/sidebar.js"> -->

=======
    <title>Menu</title>
    <?php
    include '../modular/library.php';
    include '../modular/icon.php';
    ?>
    <link rel="stylesheet" href="../style/sidebar.css">
</head>

<style>
    .card {
        height: auto;
        transition: all 0.3s ease-out;
    }

    .card:hover {
        transform: scale(1.04);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .card img {
        width: 100%;
        height: 34vh;
    }

    .card button {
        background-color: #ffe31a;
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
        <?php
        include '../modular/menu_member.php';
        ?>
    <?php } else if ($_SESSION['level'] == 'admin') { ?>
        <?php
        include '../modular/menu_admin.php';
        ?>
    <?php } ?>

    <div class="modal fade" id="pesanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="pesanData" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pesan Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Input Hidden -->
                        <input type="hidden" name="id_users" value="<?= $_SESSION['id_users'] ?>">
                        <input type="hidden" id="produk_dibeli" name="produk_dibeli">
                        <input type="hidden" id="harga" name="harga">

                        <!-- Nama Customer -->
                        <div class="mb-3">
                            <label for="nama_costumer" class="form-label">Nama Customer</label>
                            <input type="text" class="form-control" id="nama_costumer" name="nama_costumer" required>
                        </div>

                        <!-- Jumlah Beli -->
                        <div class="mb-3">
                            <label for="banyak_beli" class="form-label">Jumlah Beli</label>
                            <input type="number" class="form-control" id="banyak_beli" name="banyak_beli" required min="1" placeholder="Masukkan jumlah">
                        </div>

                        <!-- Metode Pembayaran -->
                        <div class="mb-3">
                            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                            <select class="form-select" id="metode_pembayaran" name="metode_pembayaran" required>
                                <option value="COD">COD</option>
                                <option value="Bank/E-Wallet">Bank/E-Wallet</option>
                            </select>
                        </div>

                        <!-- Alamat Pengiriman (Khusus COD) -->
                        <div class="mb-3" id="alamat_field" style="display: none;">
                            <label for="alamat_pengiriman" class="form-label">Alamat Pengiriman</label>
                            <textarea class="form-control" id="alamat_pengiriman" name="alamat_pengiriman"></textarea>
                        </div>

                        <!-- Total Harga -->
                        <div class="mb-3">
                            <label for="total_harga" class="form-label">Total Harga</label>
                            <input type="text" class="form-control" id="total_harga" name="total_harga" readonly placeholder="Total harga akan dihitung otomatis">
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
                            <label for="id_menu" class="form-label">Kode Barang (Auto)</label>
                            <input type="text" value="<?php echo generateUID($con); ?>" class="form-control" id="id_menu" name="id_menu" readonly>
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
        $(document).ready(function() {
            function pesanMenu(formData) {
                // Tampilkan loading
                $('#loading').show();

                $.ajax({
                    url: 'proses_transaksi.php', // Pastikan URL benar
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Sembunyikan loading
                        $('#loading').hide();

                        // Debug respons
                        console.log("Respons dari server:", response);

                        // Tampilkan SweetAlert berdasarkan respons
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Pemesanan berhasil !',
                            confirmButtonColor: '#ffe31a'
                        }).then(() => {
                            window.location.reload(); // Pindah ke halaman login setelah sukses
                        });
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
            $('#pesanData').on('submit', function(e) {
                e.preventDefault(); // Mencegah reload halaman
                const formData = new FormData(this); // Buat FormData dari elemen form
                pesanMenu(formData); // Kirim data ke server
            });
        });

        document.querySelectorAll('[data-bs-toggle="modal"]').forEach(button => {
            button.addEventListener('click', function() {
                const idProduk = this.getAttribute('data-idproduk');
                const namaProduk = this.getAttribute('data-namaproduk');
                const harga = parseFloat(this.getAttribute('data-harga')); // Ambil harga produk (float)

                // Set nilai awal untuk modal
                document.getElementById('produk_dibeli').value = namaProduk;
                document.getElementById('harga').value = harga;

                const banyakBeliInput = document.getElementById('banyak_beli');
                const totalHargaInput = document.getElementById('total_harga');

                // Fungsi menghitung total harga
                function updateTotalHarga() {
                    const jumlahBeli = parseInt(banyakBeliInput.value) || 0; // Pastikan default 0
                    const total = jumlahBeli * harga; // Kalkulasi total harga
                    totalHargaInput.value = total; // Format angka Indonesia
                }

                // Panggil fungsi saat input berubah
                banyakBeliInput.addEventListener('input', updateTotalHarga);
                banyakBeliInput.addEventListener('keyup', updateTotalHarga);

                // Reset total harga ketika modal dibuka
                banyakBeliInput.value = '';
                totalHargaInput.value = '';
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

        // $(document).ready(function() {
        //     $('#menuTable').DataTable();
        // });

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
>>>>>>> 68d6b83 (DONE)
    </script>
</body>

</html>