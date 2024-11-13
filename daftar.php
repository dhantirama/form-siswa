<?php
include 'koneksi.php';
if (isset($_POST['submit'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $id_gelombang = $_POST['id_gelombang'];
    $id_jurusan = $_POST['id_jurusan'];
    $nik = $_POST['nik'];
    $kartu_keluarga = $_POST['kartu_keluarga'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $nama_sekolah = $_POST['nama_sekolah'];
    $kejuruan = $_POST['kejuruan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $aktivitas = $_POST['aktivitas'];
    $pendidikan = $_POST['pendidikan'];

    if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto']['name'];
        $fotoSize = $_FILES['foto']['size'];

        $ext = array('png', 'jpg', 'jpeg');
        $extfoto = pathinfo($foto, PATHINFO_EXTENSION);

        //Jika extensi foto tidak memenuhi syarat array extensi
        if (!in_array($extfoto, $ext)) {
            echo "Gunakan Foto Lain";
            die;
        } else {
            move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/' . $foto);  //memindahkan foto ke folder upload
            $submit = mysqli_query($koneksi, "INSERT INTO peserta_pelatihan (foto, aktivitas, pendidikan, jenis_kelamin, id_jurusan, id_gelombang, nama_lengkap, nik, kartu_keluarga, email, no_hp, tanggal_lahir, tempat_lahir, nama_sekolah, kejuruan) VALUES ('$foto', '$aktivitas', '$pendidikan','$jenis_kelamin', '$id_jurusan', '$id_gelombang','$nama_lengkap', '$nik', '$kartu_keluarga', '$email', '$no_hp', '$tanggal_lahir', '$tempat_lahir', '$nama_sekolah', '$kejuruan')");
        }
    }
    header("location:berhasil.php?tambah=berhasil");
}


$queryGel = mysqli_query($koneksi, "SELECT * FROM gelombang WHERE status = 1 ORDER BY id ASC");
$queryJurusan = mysqli_query($koneksi, "SELECT * FROM jurusan");

$opsi = array("Perempuan", "Laki-laki");
$aktivitas = array("Kuliah", "Kerja", "Jobseeker");
$pendidikan = array("SD", "SMP", "SMA", "S1");

?>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="page/backend/assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Account settings - Account | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="page/backend/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="page/backend/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="page/backend/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="page/backend/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="page/backend/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="page/backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="page/backend/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="page/backend/assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">


            <!-- Layout container -->
            <div class="layout-page">

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Silahkan Daftar</span> Kejuruan</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Data Diri</a>
                                    </li>
                                </ul>
                                <div class="card mb-4">
                                    <h5 class="card-header">Profile Diri</h5>
                                    <!-- Account -->
                                    <form id="formAccountSettings" method="POST" onsubmit="">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                <img
                                                    src="page/backend/assets/img/avatars/1.png"
                                                    alt="user-avatar"
                                                    class="d-block rounded"
                                                    height="100"
                                                    width="100"
                                                    id="uploadedAvatar" />
                                                <div class="button-wrapper">
                                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                        <span class="d-none d-sm-block">Unggah Foto</span>
                                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                                        <input
                                                            type="file"
                                                            id="upload"
                                                            class="account-file-input"
                                                            hidden
                                                            accept="image/png, image/jpeg" name="foto" />
                                                    </label>
                                                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Reset</span>
                                                    </button>

                                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-0" />
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        id="nama_lengkap"
                                                        name="nama_lengkap"
                                                        value="John"
                                                        autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="language" class="form-label">Gelombang</label>
                                                    <select name="id_gelombang" id="" class="form-control">
                                                        <!-- isi data diambil dari database kategori -->
                                                        <?php while ($rowGel = mysqli_fetch_assoc($queryGel)): ?>
                                                            <option value="<?php echo $rowGel['id'] ?>"><?php echo $rowGel['gelombang'] ?></option>
                                                        <?php endwhile ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="language" class="form-label">Pilih Program</label>
                                                    <select name="id_jurusan" id="language" class="select2 form-select">
                                                        <?php while ($rowJurusan = mysqli_fetch_assoc($queryJurusan)): ?>
                                                            <option value="<?php echo $rowJurusan['id'] ?>"><?php echo $rowJurusan['jurusan'] ?></option>
                                                        <?php endwhile ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastName" class="form-label">NIK</label>
                                                    <input name="nik" id="nik" class="form-control" type="text" value="Doe" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">E-mail</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        id="email"
                                                        name="email"
                                                        value="john.doe@example.com"
                                                        placeholder="john.doe@example.com" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="phoneNumber">No Ponsel</label>
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text">ID (+62)</span>
                                                        <input
                                                            type="number"
                                                            id="no_hp"
                                                            name="no_hp"
                                                            class="form-control"
                                                            placeholder="202 555 0111" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="state" class="form-label">Tanggal Lahir</label>
                                                    <input class="form-control" type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="California" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="organization" class="form-label">Kartu Keluarga</label>
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        id="kartu_keluarga"
                                                        name="kartu_keluarga"
                                                        value="ThemeSelection" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="address" class="form-label">Tempat Lahir</label>
                                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Address" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="country">Jenis Kelamin</label>
                                                    <select name="jenis_kelamin" id="jenis_kelamin" class="select2 form-select">
                                                        <option value="">Select</option>
                                                        <?php foreach ($opsi as $jenis_kelamin): ?>
                                                            <option value="<?php echo strtolower($jenis_kelamin); ?>"><?php echo $jenis_kelamin; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="language" class="form-label">Pendidikan Terakhir</label>
                                                    <select name="pendidikan" id="pendidikan" class="select2 form-select">
                                                        <option value="">Pilih Pendidikan</option>
                                                        <?php foreach ($pendidikan as $pend): ?>
                                                            <option value="<?php echo strtolower($pend); ?>"><?php echo $pend; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="zipCode" class="form-label">Nama Sekolah</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="nama_sekolah"
                                                        name="nama_sekolah"
                                                        placeholder="231465"
                                                        maxlength="6" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="address" class="form-label">Jurusan Sekolah</label>
                                                    <input type="text" class="form-control" id="kejuruan" name="kejuruan" placeholder="Address" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="language" class="form-label">Aktivitas</label>
                                                    <select name="aktivitas" id="aktivitas" class="select2 form-select">
                                                        <option value="">Aktivitas Saat Ini</option>
                                                        <?php foreach ($aktivitas as $act): ?>
                                                            <option value="<?php echo strtolower($act); ?>"><?php echo $act; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <button type="submit" name="submit" class="btn btn-primary me-2">Save changes</button>
                                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                            </div>
                                    </form>
                                </div>
                                <!-- /Account -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            , made with ❤️ by
                            <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                        </div>
                        <div>
                            <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                            <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                            <a
                                href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                                target="_blank"
                                class="footer-link me-4">Documentation</a>

                            <a
                                href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                                target="_blank"
                                class="footer-link me-4">Support</a>
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="page/backend/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="page/backend/assets/vendor/libs/popper/popper.js"></script>
    <script src="page/backend/assets/vendor/js/bootstrap.js"></script>
    <script src="page/backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="page/backend/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="page/backend/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="page/backend/assets/js/pages-account-settings-account.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>