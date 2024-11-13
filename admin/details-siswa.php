<?php
include '../koneksi.php';
session_start();
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryPeserta = mysqli_query($koneksi, "SELECT jurusan.jurusan, gelombang.gelombang, peserta_pelatihan.* FROM peserta_pelatihan 
LEFT JOIN gelombang ON gelombang.id = peserta_pelatihan.id_gelombang 
LEFT JOIN jurusan ON jurusan.id = peserta_pelatihan.id_jurusan WHERE peserta_pelatihan.id = '$id'");
$rowPeserta = mysqli_fetch_assoc($queryPeserta);

?>

<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../page/backend/assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Details Siswa</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../page/backend/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../page/backend/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../page/backend/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../page/backend/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../page/backend/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../page/backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../page/backend/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../page/backend/assets/js/config.js"></script>
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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Peserta</span> <?php echo $rowPeserta['jurusan'] ?></h4>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <h5 class="card-header">Profile <?php echo $rowPeserta['nama_lengkap'] ?></h5>
                                    <!-- Account -->
                                    <form id="formAccountSettings" method="POST" onsubmit="">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                <img
                                                    src="../page/backend/assets/img/avatars/1.png"
                                                    alt="user-avatar"
                                                    class="d-block rounded"
                                                    height="100"
                                                    width="100"
                                                    id="uploadedAvatar" />
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
                                                        value="<?php echo $rowPeserta['nama_lengkap'] ?>"
                                                        readonly />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="language" class="form-label">Gelombang</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        id="id_gelombang"
                                                        name="id_gelombang"
                                                        value="<?php echo $rowPeserta['gelombang'] ?>"
                                                        readonly />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="language" class="form-label">Program Kejuruan</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        id="id_jurusan"
                                                        name="id_jurusan"
                                                        value="<?php echo $rowPeserta['jurusan'] ?>"
                                                        readonly />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastName" class="form-label">NIK</label>
                                                    <input class="form-control" type="text" name="nik" id="nik" value="<?php echo $rowPeserta['nik'] ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">E-mail</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        id="email"
                                                        name="email"
                                                        value="<?php echo $rowPeserta['email'] ?>"
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
                                                            value="<?php echo $rowPeserta['no_hp'] ?>"
                                                            placeholder="202 555 0111" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="state" class="form-label">Tanggal Lahir</label>
                                                    <input class="form-control" type="text" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $rowPeserta['tanggal_lahir'] ?>" placeholder="California" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="organization" class="form-label">Kartu Keluarga</label>
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        id="kartu_keluarga"
                                                        name="kartu_keluarga"
                                                        value="<?php echo $rowPeserta['kartu_keluarga'] ?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="address" class="form-label">Tempat Lahir</label>
                                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $rowPeserta['tempat_lahir'] ?>" placeholder="Address" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="country">Jenis Kelamin</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        id="nama_lengkap"
                                                        name="nama_lengkap"
                                                        value="<?php echo $rowPeserta['jenis_kelamin'] ?>"
                                                        readonly />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="language" class="form-label">Pendidikan Terakhir</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        id="pendidikan"
                                                        name="pendidikan"
                                                        value="<?php echo $rowPeserta['pendidikan'] ?>"
                                                        readonly />
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="zipCode" class="form-label">Nama Sekolah</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="nama_sekolah"
                                                        name="nama_sekolah"
                                                        value="<?php echo $rowPeserta['nama_sekolah'] ?>"
                                                        readonly />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="address" class="form-label">Kejuruan Sekolah</label>
                                                    <input type="text" class="form-control" id="kejuruan" name="kejuruan" value="<?php echo $rowPeserta['kejuruan'] ?>" readonly />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="language" class="form-label">Aktivitas</label>
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        id="aktivitas"
                                                        name="aktivitas"
                                                        value="<?php echo $rowPeserta['aktivitas'] ?>"
                                                        readonly />
                                                </div>
                                            </div>
                                            <div class="btn-group">
                                                <button
                                                    type="button"
                                                    class="btn btn-primary dropdown-toggle"
                                                    data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Status
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="wawancara.php">Wawancara</a></li>
                                                    <li><a class="dropdown-item" href="tidak-lulus.php">Tidak Lulus</a></li>
                                                </ul>
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
    <script src="../page/backend/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../page/backend/assets/vendor/libs/popper/popper.js"></script>
    <script src="../page/backend/assets/vendor/js/bootstrap.js"></script>
    <script src="../page/backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../page/backend/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../page/backend/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../page/backend/assets/js/pages-account-settings-account.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>