<?php
include '../backend/koneksi/koneksi.php';
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: ../login_form');
    exit();
}

$query = "SELECT * FROM users";
$result = mysqli_query($con, $query);
$no = 0;

function generateUID($con)
{
    // Query untuk mendapatkan UID terbesar yang ada di tabel
    $query = "SELECT MAX(id_users) as max_uid FROM users";
    $result = $con->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $maxUid = $row['max_uid'];

        if ($maxUid) {
            // Ambil angka dari UID terakhir (USER001 -> 1)
            $number = (int)substr($maxUid, 4);
            $newNumber = $number + 1; // Tambahkan 1
        } else {
            // Jika belum ada UID, mulai dari USER001
            $newNumber = 1;
        }

        // Format angka menjadi tiga digit, misalnya 1 -> 001
        return 'USER' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    } else {
        die("Error: " . $con->error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Akun</title>
    <?php
    include '../modular/library.php';
    include '../modular/icon.php';
    ?>
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
</head>

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
    <div class="container">
        <h1>Hello ini admin</h1>
        <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addUsers">Add Users</button>
        <!-- Tampilkan alert jika ada -->
        <?php
        if (isset($_SESSION['notif'])) {
            echo '<div id="alert-message" class="alert alert-warning alert-dismissible fade show mb-4">' . $_SESSION['notif'] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            unset($_SESSION['notif']); // Hapus session alert setelah ditampilkan
        }
        ?>
        <table id="usersTable" class="table table-bordered table-striped table-hover">
            <thead class="table-primary" style="color: #ffe31a;">
                <tr>
                    <th>No</th>
                    <th>ID Users</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Foto Profil</th>
                    <th>Tanggal Di Buat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row["id_users"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["username"]; ?></td>
                            <td><?php echo $row["level"]; ?></td>
                            <td><?php echo $row["status"]; ?></td>
                            <td><img src="../dashboard/<?php echo $row["profile_image"]; ?>" alt="Foto" style="width: 100px; height: auto;"></td>
                            <td><?php echo $row["created_at"]; ?></td>
                            <td>
                                <!-- Tombol Edit -->
                                <button class="btn btn-warning btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editUsers"
                                    onclick="setEditModal(
                                        '<?php echo $row['id_users']; ?>',
                                        '<?php echo $row['email']; ?>',
                                        '<?php echo $row['username']; ?>',
                                        '<?php echo $row['level']; ?>',
                                        '<?php echo $row['profile_image']; ?>'
                                    )"><i class='bx bxs-edit-alt'></i></button>
                                <!-- Tombol Lihat -->
                                <button class="btn btn-info btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#viewMenuModal"
                                    onclick="setViewModal(
                                        '<?php echo $row['id_users']; ?>',
                                        '<?php echo $row['email']; ?>',
                                        '<?php echo $row['username']; ?>',
                                        '<?php echo $row['level']; ?>',
                                        '<?php echo $row['profile_image']; ?>'
                                    )"><i class='bx bxs-show'></i></button>
                                <a href="#" class="btn btn-primary btn-sm btn-reset"
                                    data-idUser="<?php echo $row['id_users']; ?>"
                                    data-url="../admin/users/reset-users.php?id_users=<?php echo $row['id_users']; ?>">
                                    <i class="bx bxs-key"></i>
                                </a>
                                <!-- Tombol Hapus -->
                                <a href="#" class="btn btn-danger btn-sm btn-delete"
                                    data-idUser="<?php echo $row['id_users']; ?>"
                                    data-url="../admin/users/delete-users.php?id_users=<?php echo $row['id_users']; ?>">
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

    <!-- Modal Reset Password -->
    <div class="modal fade" id="resetPasswordModal" tabindex="-1" aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="resetPasswordModalLabel">Reset Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin mereset password pengguna ini?</p>
                        <p>Password baru akan diset ke: <strong>tim-safsar</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary confirm-reset-password">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal untuk tambah users -->
    <div class="modal fade" id="addUsers" tabindex="-1" aria-labelledby="addUsersLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formAdd" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUsersLabel">Add Users</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="id_users" class="form-label">Kode Barang (Auto)</label>
                            <input type="text" value="<?php echo generateUID($con); ?>" class="form-control" id="id_users" name="id_users" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Level</label>
                            <select class="form-select" id="level" name="level" required>
                                <option value="admin">Admin</option>
                                <option value="member">Member</option>
                            </select>
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

    <!-- Modal untuk edit users -->
    <div class="modal fade" id="editUsers" tabindex="-1" aria-labelledby="editUsersLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formEdit" action="../admin/users/edit-users.php" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUsersLabel">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_id_user" class="form-label">Kode User</label>
                            <input type="text" class="form-control" id="edit_id_user" name="id_users" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="edit_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="edit_username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="edit_password" name="password">
                            <p class="text-danger">*isi jika anda ingin merubah password</p>
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Level</label>
                            <select class="form-select" id="edit_level" name="level" required>
                                <option value="admin">Admin</option>
                                <option value="member">Member</option>
                            </select>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="edit_foto_profil" class="form-label">Foto Profil</label>
                            <input type="file" class="form-control" id="edit_foto_profil" name="profile_image" accept="image/*">
                            <p class="text-danger">*isi jika anda ingin merubah foto profil</p>
                        </div> -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewMenuModal" tabindex="-1" aria-labelledby="viewMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewMenuModalLabel">View Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>ID User:</strong> <span id="view_id_user"></span></p>
                    <p><strong>Email:</strong> <span id="view_email"></span></p>
                    <p><strong>Username:</strong> <span id="view_username"></span></p>
                    <p><strong>Level:</strong> <span id="view_level"></span></p>
                    <p><strong>Foto Profil:</strong></p>
                    <img id="view_pp" src="" alt="Foto Produk" style="width: 100%; height: auto;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function setEditModal(id, email, user, level, foto) {
            document.getElementById('edit_id_user').value = id;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_username').value = user;
            document.getElementById('edit_level').value = level;
        }

        // fungsi untuk set view pada modal view
        function setViewModal(id, email, username, level, foto) {
            document.getElementById('view_id_user').textContent = id;
            document.getElementById('view_email').textContent = email;
            document.getElementById('view_username').textContent = username;
            document.getElementById('view_level').textContent = level;
            document.getElementById('view_pp').src = foto;
        }

        // sweet alert untuk delete user
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault(); // Mencegah default action dari <a>

                const idUser = this.getAttribute('data-idUser');
                const deleteUrl = this.getAttribute('data-url');

                // SweetAlert untuk konfirmasi
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: `Data dengan ID ${idUser} akan dihapus!`,
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

        // sweet alert untuk reset password
        document.querySelectorAll('.btn-reset').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault(); // Mencegah default action dari <a>

                const idUser = this.getAttribute('data-idUser');
                const resetUrl = this.getAttribute('data-url');

                Swal.fire({
                    title: 'Konfirmasi Reset Password',
                    html: `<p>Apakah Anda yakin ingin mereset password untuk <b>ID: ${idUser}</b>?</p>
           <p>Password akan diubah menjadi <b>"tim-safsar"</b>.</p>`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ffc107', // Warna kuning
                    cancelButtonColor: '#d33', // Warna merah
                    confirmButtonText: 'Ya, Reset',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika user mengkonfirmasi, redirect ke URL reset
                        window.location.href = resetUrl;
                    }
                });

            });
        });


        // Fungsi untuk mengirim data ke `add-users.php`
        function addData(dataForm) {
            $.ajax({
                url: '../admin/users/add-users.php', // File proses
                type: 'POST',
                data: dataForm, // Data yang dikirim
                success: function(response) {
                    // Tampilkan SweetAlert berdasarkan respons
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Tambah Users Berhasil',
                        confirmButtonColor: '#ffc107'
                    }).then(() => {
                        window.location.reload(); // Refresh otomatis halaman setelah sukses
                    });
                },
                error: function() {
                    // Tampilkan SweetAlert untuk error
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan.',
                        confirmButtonColor: '#dc3545'
                    });
                }
            });
        }
        // add users
        // Panggil ini saat form di-submit
        $('#formAdd').on('submit', function(e) {
            e.preventDefault(); // Mencegah reload halaman
            const formData = $(this).serialize(); // Ambil data form
            addData(formData); // Kirim data ke edit-menu.php
        });

        // fungsi agar session notif hilang selama 5 detik
        setTimeout(function() {
            const alertMessage = document.getElementById('alert-message');
            if (alertMessage) {
                alertMessage.style.display = 'none';
            }
        }, 5000);

        $(document).ready(function() {
            $('#usersTable').DataTable({
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

        // $(document).ready(function() {
        //     function editData(dataForm) {
        //         $.ajax({
        //             url: '../admin/users/edit-users.php', // Pastikan URL benar
        //             type: 'POST',
        //             data: dataForm,
        //             processData: false, // Jangan proses data FormData
        //             contentType: false, // Jangan tetapkan jenis konten secara manual
        //             success: function(response) {
        //                 // Debug respons
        //                 console.log(response);

        //                 // Tampilkan SweetAlert berdasarkan respons
        //                 Swal.fire({
        //                     icon: 'success',
        //                     title: 'Berhasil!',
        //                     text: 'Data Berhasil Diubah!',
        //                     confirmButtonColor: '#ffc107'
        //                 }).then(() => {
        //                     window.location.reload(); // Refresh halaman setelah sukses
        //                 });
        //             },
        //             error: function(xhr, status, error) {
        //                 // Debug error
        //                 console.error(xhr.responseText);

        //                 // Tampilkan SweetAlert untuk error
        //                 Swal.fire({
        //                     icon: 'error',
        //                     title: 'Gagal!',
        //                     text: 'Terjadi kesalahan saat menambahkan menu.',
        //                     confirmButtonColor: '#dc3545'
        //                 });
        //             }
        //         });
        //     }

        //     // Event listener untuk submit form
        //     $('#formEdit').on('submit', function(e) {
        //         e.preventDefault(); // Mencegah reload halaman

        //         // Ambil data dari form
        //         const formData = new FormData(this); // Buat FormData dari elemen form
        //         editData(formData); // Kirim data ke add-menu.php
        //     });
        // });
    </script>
</body>

</html>