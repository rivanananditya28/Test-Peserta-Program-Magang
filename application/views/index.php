<?php
session_start();
include '../config/db.php';

if (@$_SESSION['Admin']) {
}
?>
<?php
if (@$_SESSION['Admin']) {
    $sesi = @$_SESSION['Admin'];
    $sql = mysqli_query($con, "SELECT * FROM user WHERE id = '$sesi'") or die(mysqli_error($con));
    $data = mysqli_fetch_array($sql);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Admin | <?= $data['nama']; ?></title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="../vendor/node_modules/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../vendor/node_modules/simple-line-icons/css/simple-line-icons.css">
        <!-- plugin css for this page -->
        <link rel="stylesheet" href="../vendor/node_modules/font-awesome/css/font-awesome.min.css" />
        <!-- endinject -->
        <!-- plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="../vendor/css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="../vendor/images/favicon1.png" />
        <link href="../vendor/sweetalert/sweetalert.css" rel="stylesheet" />
        <script type="text/javascript" src="../vendor/ckeditor/ckeditor.js"></script>
        <link rel="stylesheet" type="text/css" href="../vendor/css/jquery.dataTables.css">
    </head>

    <body>
        <div class="container-scroller">
            <!-- partial:../../partials/_navbar.html -->
            <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center" style="background-color:#aed3fc ;">
                    <a class="navbar-brand brand-logo" href="index.php" style="font-family:Aegyptus;font-size: 30px;text-decoration: none;">
                        <img src="../vendor/images/31.png" alt="logo" style="width: 120px;">
                    </a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-center" style="background-color: #000761;">
                    <ul class="navbar-nav navbar-nav-right" style="border-top-left-radius:50px;color: black;border-bottom-left-radius:50px;color: #fff;border:1px">
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="index.php?page=setting&act=user">
                                <b>My Profile</b>
                                <img class="img-xs rounded-circle" src="../vendor/images/img_Users/<?php if ($data['image']) {
                                                                                                        echo $data['image'];
                                                                                                    } else {
                                                                                                        echo 'usd.png';
                                                                                                    } ?>" alt="">
                            </a>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="icon-menu"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:../../partials/_sidebar.html -->
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <li class="nav-item nav-profile">
                            <div class="nav-link">
                                <div class="profile-image">
                                    <img src="../vendor/images/img_Users/<?php if ($data['image']) {
                                                                                echo $data['image'];
                                                                            } else {
                                                                                echo 'usd.png';
                                                                            } ?>" alt="image" style="border:3px solid black;" />
                                    <span class="online-status online"></span>
                                </div>
                                <div class="profile-name">
                                    <p class="name"><?= $data['nama_lengkap']; ?></p>
                                    <p class="designation">Administrator</p>
                                    <div class="badge badge-teal mx-auto mt-3">Online</div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <img class="menu-icon" src="../vendor/images/menu_icons/01.png" alt="menu icon">
                                <span class="menu-title">DASHBOARD</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=artikel">
                                <i class="fa fa-newspaper-o icon-md" style="font-size:20px;"></i> &nbsp;
                                <span class="menu-title"> BERITA/EVENT</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=staff">
                                <i class="fa fa-spin fa-gear icon-md" style="font-size:20px;"></i> &nbsp;
                                <span class="menu-title"> STAFF</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=galeri">
                                <i class="fa fa-file" aria-hidden="true"></i> &nbsp;
                                <span class="menu-title">GALERI FOTO</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=pengumuman">
                                <i class="fa fa-eye" aria-hidden="true"></i> &nbsp;
                                <span class="menu-title">PENGUMUMAN</span></a>
                        </li>
                        <hr>
                        <li class="nav-item purchase-button">
                            <a class="nav-link" href="logout.php">
                                Logout</a>
                        </li>
                    </ul>
                </nav>
                <!-- partial -->
                <div class="main-panel">
                    <!-- Konten -->
                    <?php
                    error_reporting();
                    $page = @$_GET['page'];
                    $act = @$_GET['act'];
                    if ($page == 'staff') {
                        if ($act == '') {
                            include 'modul/staff/data_staff.php';
                        } elseif ($act == 'del') {
                            include 'modul/staff/del_staff.php';
                        } elseif ($act == 'confirm') {
                            include 'modul/staff/confir_staff.php';
                        } elseif ($act == 'unconfirm') {
                            include 'modul/staff/unconfir_staff.php';
                        } elseif ($act == 'proses') {
                            include 'modul/staff/proses.php';
                        } elseif ($act == 'add') {
                            include 'modul/staff/add_staff.php';
                        } elseif ($act == 'edit') {
                            include 'modul/staff/edit_staff.php';
                        }
                    } elseif ($page == 'artikel') {
                        if ($act == '') {
                            include 'modul/artikel/data_artikel.php';
                        } elseif ($act == 'add') {
                            include 'modul/artikel/add_artikel.php';
                        } elseif ($act == 'artikeledit') {
                            include 'modul/artikel/edit_artikel.php';
                        } elseif ($act == 'artikeldel') {
                            include 'modul/artikel/del_artikel.php';
                        } elseif ($act == 'proses') {
                            include 'modul/artikel/proses.php';
                        }
                    } elseif ($page == 'galeri') {
                        if ($act == '') {
                            include 'modul/galeri/data_galeri.php';
                        } elseif ($act == 'add') {
                            include 'modul/galeri/add_galeri.php';
                        } elseif ($act == 'galeriedit') {
                            include 'modul/galeri/edit_galeri.php';
                        } elseif ($act == 'galeridel') {
                            include 'modul/galeri/del_galeri.php';
                        } elseif ($act == 'proses') {
                            include 'modul/galeri/proses.php';
                        }
                    } elseif ($page == 'pengumuman') {
                        if ($act == '') {
                            include 'modul/pengumuman/data_pengumuman.php';
                        } elseif ($act == 'add') {
                            include 'modul/pengumuman/add_pengumuman.php';
                        } elseif ($act == 'pengumumanedit') {
                            include 'modul/pengumuman/edit_pengumuman.php';
                        } elseif ($act == 'pengumumandel') {
                            include 'modul/pengumuman/del_pengumuman.php';
                        } elseif ($act == 'proses') {
                            include 'modul/pengumuman/proses.php';
                        }
                    } elseif ($page == 'setting') {
                        if ($act == '') {
                            include 'modul/setting/setting.php';
                        } elseif ($act == 'user') {
                            include 'modul/setting/setting_user.php';
                        }
                    } elseif ($page == 'proses') {
                        include 'modul/procces.php';
                    } elseif ($page == '') {
                        include 'Home.php';
                    } else {
                        echo "<b>4014!</b> Tidak ada halaman !";
                    }

                    ?>
                    <!-- End-kontent -->
                </div>
            </div>
        </div>


        <!-- plugins:js -->
        <script src="../vendor/js/jquery.min.js"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
        <script src="../vendor/js/jquery.dataTables.js"></script>
        <script src="../vendor/node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="../vendor/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../vendor/sweetalert/sweetalert.min.js"></script>
        <script src="script.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="../vendor/js/off-canvas.js"></script>
        <script src="../vendor/js/misc.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <!-- End custom js for this page-->
        <script>
            CKEDITOR.replace('ckeditor', {
                filebrowserImageBrowseUrl: '../vendor/kcfinder',
                // uiColor:'#1991eb'
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#data').DataTable();
            });
        </script>
    </body>

    </html>


<?php
} else {

    include 'modul/500.html';

    // echo "<script>
    // window.location='../index.php';</script>";

} ?>