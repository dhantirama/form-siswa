<?php
include '../koneksi.php';
if (isset($_POST['tambah'])) {
    $gelombang = $_POST['gelombang'];
    $status = $_POST['status'];

    $insert = mysqli_query($koneksi, "INSERT INTO gelombang (gelombang, status) VALUES ('$gelombang', '$status')");

    header("location: gelombang.php?edit=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editGel = mysqli_query($koneksi, "SELECT * FROM gelombang WHERE id= '$id'");
$rowGel = mysqli_fetch_assoc($editGel);

if (isset($_POST['edit'])) {
    $gelombang = $_POST['gelombang'];
    $status = $_POST['status'];

    $update = mysqli_query($koneksi, "UPDATE gelombang SET gelombang='$gelombang', status='$status' WHERE id='$id'");
    header("location: gelombang.php?edit=berhasil");
}

?>

<!DOCTYPE html>
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

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

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

    <link rel="stylesheet" href="../page/backend/assets/vendor/libs/apex-charts/apex-charts.css" />

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
            <!-- Menu -->
            <?php include '../inc/sidebar.php' ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php include '../inc/header.php'; ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="wrapper">
                    <div class="container mt-5">
                        <div class="row">
                            <div col-sm-12>
                                <fieldset class="border border-2 p-3" style="border-width: 2px; border-color: black; border-style: solid;">
                                    <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Gelombang</legend>
                                    <form action="" method="post">
                                        <div class="mb-3">
                                            <label for="gelombang" class="form-label">Gelombang Ke-</label>
                                            <input type="text" class="form-control" name="gelombang" placeholder="Masukkan Gelombang" value="<?php echo isset($_GET['edit']) ? $rowGel['gelombang'] : '' ?>">
                                        </div>
                                        <label class="col-sm-2 col-form-label" for="level">Status</label>
                                        <div class="col-sm-10">
                                            <select name="status" class="form-control">
                                                <option value="0" <?php echo isset($_GET['edit']) && $rowGel['status'] == 0 ? 'selected' : ''; ?>>Tidak Aktif</option>
                                                <option value="1" <?php echo isset($_GET['edit']) && $rowGel['status'] == 1 ? 'selected' : ''; ?>>Aktif</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-success" name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>">Simpan</button>
                                        </div>
                                    </form>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <div class="buy-now">
        <a
            href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
            target="_blank"
            class="btn btn-danger btn-buy-now">Upgrade to Pro</a>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../page/backend/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../page/backend/assets/vendor/libs/popper/popper.js"></script>
    <script src="../page/backend/assets/vendor/js/bootstrap.js"></script>
    <script src="../page/backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../page/backend/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../page/backend/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../page/backend/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../page/backend/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>