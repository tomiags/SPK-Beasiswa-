<?php
include "../lib/koneksi.php";

 $kriteria = mysqli_query($con,"SELECT * FROM tbl_kriteria");
 $murid = mysqli_query($con,"SELECT * FROM tbl_murid");
 $admin = mysqli_query($con,"SELECT * FROM tbl_admin");
 $nilai = mysqli_query($con,"SELECT DISTINCT tgl_daftar FROM tbl_penilaian");

 $jumlah_kriteria = mysqli_num_rows($kriteria);
 $jumlah_murid = mysqli_num_rows($murid);
 $jumlah_admin = mysqli_num_rows($admin);
 $jumlah_nilai = mysqli_num_rows($nilai);

 ?>

 <div class="page-content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-12">
                 <div class="card">
                     <div class="card-body">
                         <div class="row">
                             <ul class="col container-filter categories-filter mb-0" id="filter">
                                 <li><a class="categories" data-filter="*">Jumlah Kriteria Penilaian : <?php echo $jumlah_kriteria; ?></a></li>
                                 <li><a class="categories" data-filter="*">Jumlah Pendaftar Beasiswa : <?php echo $jumlah_murid; ?></a></li>
                                 <li><a class="categories" data-filter="*">Jumlah Penilaian          : <?php echo $jumlah_nilai; ?></a></li>
                                 <li><a class="categories" data-filter="*">Jumlah Pengguna Sistem    : <?php echo $jumlah_admin; ?></a></li>
                             </ul>
                         </div><!-- End portfolio  -->
                     </div>
                     <!--end card-body-->
                 </div>
                 <div class="card">
                     <div class="card-body">
                         <div class="row container-grid nf-col-3  projects-wrapper">
                             <div class="col-lg-4 col-md-6 p-0 nf-item branding design coffee spacing">
                                 <div class="item-box">
                                     <a class="cbox-gallary1 mfp-image" href="../upload/pic/nh1.jpg" title="Consequat massa quis">
                                         <img class="item-container " src="../upload/pic/nh1.jpg" alt="7" />
                                         <div class="item-mask">
                                             <div class="item-caption">
                                                 <h5 class="text-light">Esktrakulikuler Pramuka</h5>
                                                 <p class="text-light">SMK Nurul Huda Losari</p>
                                             </div>
                                         </div>
                                     </a>
                                 </div>
                                 <!--end item-box-->
                             </div>
                             <!--end col-->

                             <div class="col-lg-4 col-md-6 p-0 nf-item photo spacing">
                                 <div class="item-box">
                                     <a class="cbox-gallary1 mfp-image" href="../upload/pic/nh2.jpg" title="Vivamus elementum semper">
                                         <img class="item-container mfp-fade" src="../upload/pic/nh2.jpg" alt="2" />
                                         <div class="item-mask">
                                             <div class="item-caption">
                                                 <h5 class="text-light">Pembina Pramuka</h5>
                                                 <p class="text-light">SMK Nurul Huda Losari</p>
                                             </div>
                                         </div>
                                     </a>
                                 </div>
                                 <!--end item-box-->
                             </div>
                             <!--end col-->

                             <div class="col-lg-4 col-md-6 p-0 nf-item branding coffee spacing">
                                 <div class="item-box">
                                     <a class="cbox-gallary1 mfp-image" href="../upload/pic/nh3.jpg" title="Quisque rutrum">
                                         <img class="item-container" src="../upload/pic/nh3.jpg" alt="4" />
                                         <div class="item-mask">
                                             <div class="item-caption">
                                                 <h5 class="text-light">Penyerahan Beasiswa</h5>
                                                 <p class="text-light">SMK Nurul Huda Losari</p>
                                             </div>
                                         </div>
                                     </a>
                                 </div>
                                 <!--end item-box-->
                             </div>
                             <!--end col-->

                             <div class="col-lg-4 col-md-6 p-0 nf-item branding design spacing">
                                 <div class="item-box">
                                     <a class="cbox-gallary1 mfp-image" href="../upload/pic/nh4.jpg" title="Tellus eget condimentum">
                                         <img class="item-container" src="../upload/pic/nh4.jpg" alt="5" />
                                         <div class="item-mask">
                                             <div class="item-caption">
                                                 <h5 class="text-light">Jurusan TKJ</h5>
                                                 <p class="text-light">SMK Nurul Huda Losari</p>
                                             </div>
                                         </div>
                                     </a>
                                 </div>
                                 <!--end item-box-->
                             </div>
                             <!--end col-->

                             <div class="col-lg-4 col-md-6 p-0 nf-item branding design spacing">
                                 <div class="item-box">
                                     <a class="cbox-gallary1 mfp-image" href="../upload/pic/nh5.jpg" title="Nullam quis ant">
                                         <img class="item-container" src="../upload/pic/nh5.jpg" alt="6" />
                                         <div class="item-mask">
                                             <div class="item-caption">
                                                 <h5 class="text-light">Ekstrakulikuler Paskibra</h5>
                                                 <p class="text-light">SMK Nurul Huda Losari</p>
                                             </div>
                                         </div>
                                     </a>
                                 </div>
                                 <!--end item-box-->
                             </div>
                             <!--end col-->

                             <div class="col-lg-4 col-md-6 p-0 nf-item photo spacing">
                                 <div class="item-box">
                                     <a class="cbox-gallary1 mfp-image" href="../upload/pic/nh6.jpg" title="Sed fringilla mauris">
                                         <img class="item-container" src="../upload/pic/nh6.jpg" alt="1" />
                                         <div class="item-mask">
                                             <div class="item-caption">
                                                 <h5 class="text-light">Ekstrakulikuler OSIS</h5>
                                                 <p class="text-light">SMK Nurul Huda Losari</p>
                                             </div>
                                         </div>
                                     </a>
                                 </div>
                                 <!--end item-box-->
                             </div>
                             <!--end col-->
                             <div class="col-lg-4 col-md-6 p-0 nf-item photo spacing">
                                 <div class="item-box">
                                     <a class="cbox-gallary1 mfp-image" href="../upload/pic/nh7.jpg" title="Sed fringilla mauris">
                                         <img class="item-container" src="../upload/pic/nh7.jpg" alt="1" />
                                         <div class="item-mask">
                                             <div class="item-caption">
                                                 <h5 class="text-light">Penggalangan Dana PMR</h5>
                                                 <p class="text-light">SMK Nurul Huda Losari</p>
                                             </div>
                                         </div>
                                     </a>
                                 </div>
                                 <!--end item-box-->
                             </div>
                             </div>
                         <!--end row-->
                     </div>
                     <!--end card-body-->
                 </div>


