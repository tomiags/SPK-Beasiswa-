<!doctype html>
<html lang="en" class="no-js">

<head>
    <title>SPK NUHA</title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="asset/css/eventium-assets.min.css">
    <link rel="stylesheet" type="text/css" href="asset/css/style.css">

</head>

<body>

    <!-- Container -->
    <div id="container">
        <!-- Header
		    ================================================== -->
        <header class="clearfix">

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">

                    <a class="navbar-brand" href="index.html">
                        <img src="asset/images/logo.png" alt="">
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item drop-link"><a href="#home" class="nav-link">Main</a></li>
                            <li class="nav-item drop-link"><a href="#hasil" class="nav-link">Hasil</a></li>
                            <li class="nav-item drop-link"><a href="#hasil" class="nav-link">Hasil</a></li>
                            <li class="nav-item drop-link"><a href="#footer" class="nav-link">Kontak</a></li>
                        </ul>
                        <a href="#" class="default-button">Login</a>
                    </div>
                </div>
            </nav>

        </header>
        <!-- End Header -->

        <!-- event-promo-section 
			================================================== -->
        <section class="event-promo-section">
            <div class="event-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-8">
                            <h1 class="p.thick">SPK Penerimaan Beasiswa <br> SMK Nurul Huda Losari</h1>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="event-date">
                                <p>
                                    San Francisco
                                    <span>13-15</span>
                                    April 2018
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End event-promo section -->
        <!-- event-banner-section 
			================================================== -->
        <section class="event-banner-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-8">
                        <h1>Are you ready joing us?</h1>
                        <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. </p>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="button-banner-box">
                            <a href="#" class="default-button">Register Today</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End event-banner section -->

        <!-- about-section 
			================================================== -->
        <section class="about-section" id="about">
            <div class="container">
                <div class="about-box">
                    <div class="title-section">
                        <h1>About Conference</h1>
                    </div>
                    <p>Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti. Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. </p>

                    <div class="video-box">
                        <!-- youtube -->

                        <!-- End youtube -->
                    </div>

                </div>
            </div>
        </section>
        <!-- End about section -->
        <!-- speaking-section 
			================================================== -->
        <section class="speaking-section" id="hasil">
            <div class="container">
                <div class="title-section">
                    <h1>Hasil</h1>
                    <p>Ut justo. Suspendisse potenti. Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. </p>
                </div>
                <div class="speakers-box">

                    <div class="row">
                        <?php
                        include "lib/koneksi.php";
                        $no = 1;
                        $kueri = mysqli_query($con, "SELECT DISTINCT periode, tgl_daftar, status_penilaian FROM tbl_penilaian");
                        while ($kls = mysqli_fetch_array($kueri)) {
                        ?>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="speaker-post">
                                    <div class="speaker-content">
                                        <h2><a href="#">Penilaian <?php echo $kls['periode']; ?></a></h2>
                                        <span>Status : <?php echo $kls['status_penilaian']; ?></span>
                                        <p class="description">TGL : <?php echo $kls['tgl_daftar']; ?></p>
                                        <h4 class="title"><a href="homepage.php?module=detail&tgl_daftar=<?php echo $kls['tgl_daftar']; ?>&periode=<?= $kls['periode']; ?>">Periode <?php echo $kls['periode']; ?></a></h4>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </section>
        <!-- End speaking section -->
        <!-- schedule-section 
			================================================== -->
        <section class="schedule-section">
            <div class="container">
                <div class="schedule-box">
                    <div class="title-section white-style">
                        <h1>Conference schedule</h1>
                        <p>Suspendisse potenti. Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. </p>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="schedule-block">
                                <h2>Friday, 13</h2>
                                <ul class="schedule-list">
                                    <li>
                                        <span class="time">10:00-11:00</span>
                                        <img src="upload/others/m1.jpg" alt="">
                                        <div class="schedule-cont">
                                            <p>Pellentesque aliquet nibh nec urna. </p>
                                            <p class="schedule-auth">by <span>Hubert Aguilar</span></p>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="time">11:00-12:00</span>
                                        <img src="upload/others/m2.jpg" alt="">
                                        <div class="schedule-cont">
                                            <p>In nisi neque, aliquet vel.</p>
                                            <p class="schedule-auth">by <span>John Cornick</span></p>
                                        </div>
                                    </li>
                                    <li class="time-off-item">
                                        <span class="time">12:00-13:30</span>
                                        <i class="ionicons ion-coffee"></i>
                                        <span class="time-off">Lunch Time!</span>
                                    </li>
                                    <li>
                                        <span class="time">13:30-15:00</span>
                                        <img src="upload/others/m3.jpg" alt="">
                                        <div class="schedule-cont">
                                            <p>Nullam mollis ut justo. Suspendisse potenti.</p>
                                            <p class="schedule-auth">by <span>Dalim Kumar</span></p>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="time">15:00-16:00</span>
                                        <img src="upload/others/m4.jpg" alt="">
                                        <div class="schedule-cont">
                                            <p>Morbi purus libero. </p>
                                            <p class="schedule-auth">by <span>Seth Rollis</span></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- End schedule section -->




        <!-- clients-section 
			================================================== -->
        <section class="clients-section">
            <div class="container">
                <div class="title-section">
                    <h1>Thank you to our sponsors</h1>
                    <p>Praesent elementum hendrerit tortor. Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
                </div>
                <div class="client-box">
                    <ul class="client-list">
                        <li><a href="#"><img src="asset/images/clients/1.png" alt=""></a></li>
                        <li><a href="#"><img src="asset/images/clients/2.png" alt=""></a></li>
                        <li><a href="#"><img src="asset/images/clients/3.png" alt=""></a></li>
                        <li><a href="#"><img src="asset/images/clients/4.png" alt=""></a></li>
                        <li><a href="#">Become a<br> sponsor</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End clients section -->
        <!-- footer 
			================================================== -->
        <footer>
            <div class="container">

                <div class="up-footer">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="footer-widget connect-widget">
                                <h2>Connect with us</h2>
                                <p>Get the latest updates.</p>
                                <ul class="social-icons">
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a class="youtube" href="#"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="footer-widget subscribe-widget">
                                <h2>Join the Newsletter</h2>
                                <p>Creativity happens everywhere.</p>
                                <form class="subscribe">
                                    <input type="text" name="enter-your-email" id="enter-your-email" placeholder="enter your email ..." />
                                    <input type="submit" name="subscribe-button" id="subscribe-button" value="Subscribe" />
                                </form>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="footer-widget text-widget">
                                <h2>What is Business Conference</h2>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <p class="copyright-line">&copy; Copyright Eventium Theme - Theme by Nunforest</p>

            </div>
        </footer>
        <!-- End footer -->

    </div>
    <!-- End Container -->

    <div class="preloader">
        <img alt="" src="asset/images/loader.gif">
    </div>

    <script src="asset/js/eventium-plugins.min.js"></script>
    <script src="asset/js/countdown.js"></script>
    <script src="asset/js/jquery.countTo.js"></script>
    <script src="asset/js/popper.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCiqrIen8rWQrvJsu-7f4rOta0fmI5r2SI&amp;sensor=false&amp;language=en"></script>
    <script src="asset/js/gmap3.min.js"></script>
    <script src="asset/js/script.js"></script>

</body>

</html>