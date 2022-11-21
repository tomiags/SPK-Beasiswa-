<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SMK Nurul Huda Losari</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="upload/icon/nuha.png" rel="icon">
    <link href="asset/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="asset/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="asset/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="asset/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="asset/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="asset/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="asset/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="asset/assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="homepage.php?module=hasil#"><img src="upload/icon/nuha.png"></a></h1>
            
            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a href="homepage.php?module=hasil">Home</a></li>
                    <li><a href="#about">Profil</a></li>
                    <li><a href="#popular-courses">Hasil</a></li>
                    <li><a class="active" href="login.php">Penilaian</a></li>
                </ul>
            </nav>
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <h1>Pemilihan Penerima Beasiswa<br>SMK Nurul Huda Losari</h1>
            <h2>Menggunakan sistem yang terintegrasi dengan Metode Simple Addtive Weighting</h2>
            <a href="#popular-courses" class="btn-get-started">Lihat Hasil</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <?php
        if ($_GET['module'] == 'hasil') {
            include "module/hasil.php";
        } elseif ($_GET['module'] == 'detail') {
            include "module/detail.php";
        } elseif ($_GET['module'] == 'home') {
            include "module/home.php";
        }
        ?>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>SMK Nurul Huda Losari</span></strong> | All Rights Reserved


                </div>
                <div class="credits">
                    

                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <p>
                    JL. AGUS MIFTAH NO. 72B KALIBUNTU, 52255, (0283)3315394 - 087729543884
                </p>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="asset/assets/vendor/aos/aos.js"></script>
    <script src="asset/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="asset/assets/vendor/php-email-form/validate.js"></script>
    <script src="asset/assets/vendor/purecounter/purecounter.js"></script>
    <script src="asset/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="asset/assets/js/main.js"></script>

</body>

</html>