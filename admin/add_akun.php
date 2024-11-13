<?php
include '../koneksi.php';
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id_level = $_POST['id_level'];

    $insert = mysqli_query($koneksi, "INSERT INTO user (nama, email, password, id_level) VALUES ('$nama', '$email', '$password', '$id_level')");

    header("location: akun.php?edit=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editAcc = mysqli_query($koneksi, "SELECT * FROM user where id= '$id'");
$rowAcc = mysqli_fetch_assoc($editAcc);

if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $id_level = $_POST['id_level'];
    if ($_POST['password']) {
        $password = ($_POST['password']);
    } else {
        $password = $rowAcc['password'];
    }

    $update = mysqli_query($koneksi, "UPDATE user SET nama='$nama', email='$email', password='$password', id_level='$id_level' WHERE id='$id'");
    header("location: akun.php?edit=berhasil");
}

$queryLvl = mysqli_query($koneksi, "SELECT * FROM level");
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
                            <!-- Basic Layout -->
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Akun</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="nama" class="form-control" id="basic-default-name" value="<?php echo isset($_GET['edit']) ? $rowAcc['nama'] : '' ?>"" />
                                                </div>
                                            </div>
                                            <div class=" row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <input
                                                                type="text"
                                                                id="email"
                                                                name="email"
                                                                class="form-control"
                                                                value="<?php echo isset($_GET['edit']) ? $rowAcc['email'] : '' ?>"
                                                                aria-label="john.doe"
                                                                aria-describedby="basic-default-email2" />
                                                        </div>
                                                        <div class="form-text">You can use letters, numbers & periods</div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="level">Level</label>
                                                    <div class="col-sm-10">
                                                        <select name="id_level" id="" class="form-control">
                                                            <?php while ($rowLvl = mysqli_fetch_assoc($queryLvl)): ?>
                                                                <option <?php echo isset($_GET['edit']) ? ($rowLvl['id'] == $rowAcc['id_level'] ? 'selected' : '') : '' ?> value="<?php echo $rowLvl['id'] ?>"><?php echo $rowLvl['level'] ?></option>
                                                            <?php endwhile ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-default-email">Password</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <input
                                                                type="password"
                                                                id="password"
                                                                name="password"
                                                                class="form-control"
                                                                placeholder="john.doe"
                                                                aria-label="john.doe"
                                                                aria-describedby="basic-default-email2" />
                                                            <span class="input-group-text" id="basic-default-email2"></span>
                                                        </div>
                                                        <div class="form-text">You can use letters, numbers & periods</div>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-end">
                                                    <div class="col-sm-10">
                                                        <button type="submit" name=" <?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" class="btn btn-primary">Simpan</button>
                                                        <a href="akun.php" class="btn btn-success"><i class="fa-solid fa-square-plus"></i>Kembali</a>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
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