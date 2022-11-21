<?php require '../lib/koneksi.php';
@session_start();
$id_aktiff = $_SESSION['username'];
$id_admin = $_SESSION['id_admin'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>SMK NURUL HUDA LOSARI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/logonuha.png">

    <link href="assets/plugins/dropify/css/dropify.min.css" rel="stylesheet">

    <link href="assets/plugins/filter/magnific-popup.css" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert -->
    <link href="assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

    <!-- Clock css -->
    <link href="assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="assets/plugins/custombox/custombox.min.css" rel="stylesheet" type="text/css">

    <!-- Plugins css -->
    <link href="assets/plugins/timepicker/tempusdominus-bootstrap-4.css" rel="stylesheet" />
    <link href="assets/plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <link href="assets/plugins/clockpicker/jquery-clockpicker.min.css" rel="stylesheet" />

    <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <style id="clock-animations"></style>
</head>

<body>

    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- Navbar -->
        <nav class="navbar-custom">
            <!-- <div class="topbar-left">
                    <a href="http://localhost/SPK_NUHA/web/admin/index.php?module=home" class="logo">
                        <span>
                            <img src="assets/images/sidenuha1.png" alt="logo-large" class="logo-lg">
                        </span>
                        <span>
                            <img src="assets/images/sidenuha2.png" alt="logo-small" class="logo-sm">
                        </span>
                    </a>
                </div> -->
            <div class="topbar-left">
                <a href="index.php?module=home" class="logo">
                    <span>
                        <img src="assets/images/sidenuha1.png" alt="logo-small" class="logo-sm">
                    </span>
                    <span>
                        <img src="assets/images/sidenuha3.png" alt="logo-large" class="logo-lg">
                    </span>
                </a>
            </div>
            <ul class="list-unstyled topbar-nav mb-0">
                <li>
                    <button class="button-menu-mobile nav-link waves-effect waves-light">
                        <i class="mdi mdi-menu nav-icon"></i>
                    </button>
                </li>
            </ul>
    
        </nav>
        <!-- end navbar-->
    </div>
    <!-- Top Bar End -->
    <div class="page-wrapper-img">
        <div class="page-wrapper-img-inner">
            <div class="sidebar-user media">
                <?php
                $kueriAktif = mysqli_query($con, "SELECT * FROM tbl_admin where id_admin='$id_admin'");
                while ($kat = mysqli_fetch_array($kueriAktif)) {
                ?>
                    <img src="../upload/<?php echo $kat['foto_admin']; ?>" alt="user" class="rounded-circle img-thumbnail mb-1">

                    <div class="media-body align-item-center">
                        <h5 class="text-light">Halo, <?= $kat['username']; ?></h5>
                        <ul class="list-unstyled list-inline mb-0 mt-2">
                            <li class="list-inline-item">
                                <a href="index.php?module=profile" class=""><i class="mdi mdi-account text-light"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="index.php?module=gantipass" class=""><i class="mdi mdi-settings text-light"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="logout.php" class=""><i class="mdi mdi-power text-danger"></i></a>
                            </li>
                        </ul>
                    </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="float-right align-item-center mt-2">
                            <button class="btn btn-info px-4 align-self-center report-btn"><a href="index.php?module=home"><i class="fas fa-angle-left"></i>&nbsp;&nbsp;&nbsp;<span>Back to Home</span></button></a>
                        </div>
                        <h4 class="page-title mb-2"><i class="mdi mdi-google-pages mr-2"></i>Sistem Pendukung Keputusan Penerima Beasiswa SMK Nurul Huda Losari</h4>
                        <div class="">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="javascript:void(0);">JL. AGUS MIFTAH NO. 72B KALIBUNTU, 52255, (0283)3315394 - 087729543884</a></li>
                            </ol>
                        </div>
                    </div>
                    <!--end page title box-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
    </div>
<?php } ?>
<div class="page-wrapper">
    <div class="page-wrapper-inner">
        <!-- Left Sidenav -->
        <div class="left-sidenav">
            <ul class="metismenu left-sidenav-menu" id="side-nav">
                <?php

                if ($_SESSION['tingkatan'] == "Admin") { //jika login sebagai operator
                    $leveluser = "";
                    $kp = "hidden";
                } else if ($_SESSION['tingkatan'] == "Kepsek") { //jika login sebagai pedamping
                    $leveluser = "hidden";
                    $kp = "";
                }
                ?>
                <li class="menu-title">Main Menu</li>
                <li>
                    <a href="index.php?module=home"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>
                </li>
                <li <?= $leveluser; ?>>
                    <a href="index.php?module=murid"><i class="mdi mdi-account-box"></i><span>Murid</span></a>
                </li>
                <li <?= $kp; ?>>
                    <a href="index.php?module=kriteria"><i class="mdi mdi-checkbox-multiple-marked"></i><span>Kriteria</span></a>
                </li>
                <li <?= $leveluser; ?>>
                    <a href="index.php?module=listnilai"><i class="mdi mdi-calculator"></i><span>Penilaian</span></a>
                </li>
                <li <?= $leveluser; ?>>
                    <a href="index.php?module=cetak"><i class="mdi mdi-clipboard-text-outline"></i><span>Laporan Penilaian</span></a>
                </li>
                <li <?= $kp; ?>>
                    <a href="index.php?module=rekap"><i class="mdi mdi-clipboard-text-outline"></i><span>Hasil Penilaian</span></a>
                </li>
                <li <?= $kp; ?>>
                    <a href="index.php?module=madmin"><i class="mdi mdi-account-circle"></i><span>Manajemen User</span></a>
                </li>
                <li>
                    <a href="index.php?module=about"><i class="mdi mdi-alert-circle"></i><span>About</span></a>
                </li>
            </ul>
        </div>
        <!-- end left-sidenav-->
        <?php
        if ($_GET['module'] == 'home') {
            include "module/home/home.php";
        } else if ($_GET['module'] == 'profile') {
            include "module/home/profile.php";
        } else if ($_GET['module'] == 'gantipass') {
            include "module/home/admin_password.php";
        } else if ($_GET['module'] == 'madmin') {
            include "module/admin/admin.php";
        }

        //murid
        else if ($_GET['module'] == 'murid') {
            include "module/murid/list_murid.php";
        } else if ($_GET['module'] == 'tambah_murid') {
            include "module/murid/tambah_murid.php";
        } else if ($_GET['module'] == 'edit_murid') {
            include "module/murid/edit_murid.php";
        }


        //Kriteria
        else if ($_GET['module'] == 'kriteria') {
            include "module/kriteria/list_kriteria.php";
        } else if ($_GET['module'] == 'tambah_kriteria') {
            include "module/kriteria/tambah_kriteria.php";
        } else if ($_GET['module'] == 'edit_kriteria') {
            include "module/kriteria/edit_kriteria.php";
        }

        //Penilaian
        else if ($_GET['module'] == 'listnilai') {
            include "module/penilaian/daftar_penilaian.php";
        } else if ($_GET['module'] == 'tambah_penilaian') {
            include "module/penilaian/tambah_penilaian.php";
        } else if ($_GET['module'] == 'edit_penilaian') {
            include "module/penilaian/edit_penilaian.php";
        } else if ($_GET['module'] == 'form_lanjutan') {
            include "module/penilaian/form_lanjutan.php";
        } else if ($_GET['module'] == 'detail_penilaian') {
            include "module/penilaian/detail_penilaian.php";
        } elseif ($_GET['module'] == 'cetak') {
            include "module/penilaian/cetak.php";
        } elseif ($_GET['module'] == 'ubah_penilaian') {
            include "module/penilaian/lanjut_penilaian.php";
        }

        //rekap penilaian
        else if ($_GET['module'] == 'listnilai') {
            include "module/rekap_penilaian/daftar_penilaian.php";
        } else if ($_GET['module'] == 'tambah_penilaian') {
            include "module/rekap_penilaian/tambah_penilaian.php";
        } else if ($_GET['module'] == 'edit_penilaian') {
            include "module/rekap_penilaian/edit_penilaian.php";
        } else if ($_GET['module'] == 'form_lanjutan') {
            include "module/rekap_penilaian/form_lanjutan.php";
        } else if ($_GET['module'] == 'detail_penilaian') {
            include "module/rekap_penilaian/detail_penilaian.php";
        } elseif ($_GET['module'] == 'rekap') {
            include "module/rekap_penilaian/cetak.php";
        } elseif ($_GET['module'] == 'ubah_penilaian') {
            include "module/rekap_penilaian/lanjut_penilaian.php";
        }


        //About
        else if ($_GET['module'] == 'about') {
            include "module/home/about.php";
        }
        ?>



        <!-- end page content -->
    </div>
</div>
<footer class="footer text-center text-sm-left">
    SMK Nurul Huda Losari &copy; 2020 <span class="text-by d-none d-sm-inline-block float-right"> Sistem Pendukung Keputusan SAW Penerima Beasiswa </span>
</footer>
<!-- end page-wrapper -->

<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/waves.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/moment/moment.js"></script>
<script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
<script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
<script src="https://apexcharts.com/samples/assets/series1000.js"></script>
<script src="https://apexcharts.com/samples/assets/ohlc.js"></script>

<script src="assets/pages/jquery.dashboard-3.init.js"></script>

<!-- Sweet-Alert  -->
<script src="assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="assets/pages/jquery.sweet-alert.init.js"></script>

<!-- Plugins js -->
<script src="assets/plugins/moment/moment.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/timepicker/tempusdominus-bootstrap-4.js"></script>
<script src="assets/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
<script src="assets/plugins/clockpicker/jquery-clockpicker.min.js"></script>
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>

<script src="assets/pages/jquery.clock-img.init.js"></script>

<script src="assets/plugins/dropify/js/dropify.min.js"></script>
<script src="assets/pages/jquery.form-upload.init.js"></script>
<script src="assets/plugins/filter/isotope.pkgd.min.js"></script>
<script src="assets/plugins/filter/masonry.pkgd.min.js"></script>
<script src="assets/plugins/filter/jquery.magnific-popup.min.js"></script>

<!-- Required datatable js -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables/jszip.min.js"></script>
<script src="assets/plugins/datatables/pdfmake.min.js"></script>
<script src="assets/plugins/datatables/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/buttons.print.min.js"></script>
<script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<script src="assets/pages/jquery.datatable.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>
<script>
    $(window).on('load', function() {
        // Filter 
        //PORTFOLIO FILTER 
        var $container = $('.projects-wrapper');
        var $filter = $('#filter');
        // Initialize isotope 
        $container.isotope({
            filter: '*',
            layoutMode: 'masonry',
            animationOptions: {
                duration: 750,
                easing: 'linear'
            }
        });
        // Filter items when filter link is clicked
        $filter.find('a').click(function() {
            var selector = $(this).attr('data-filter');
            $filter.find('a').removeClass('active');
            $(this).addClass('active');
            $container.isotope({
                filter: selector,
                animationOptions: {
                    animationDuration: 750,
                    easing: 'linear',
                    queue: false,
                }
            });
            return false;
        });
        /*END*/
    });
    $('.mfp-image').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-fade',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1]
            // Will preload 0 - before current, and 1 after the current image 
        }
    });
</script>
</body>

</html>