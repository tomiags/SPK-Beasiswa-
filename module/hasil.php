  <!-- ======= About Section ======= -->
  <section id="about" class="about">
      <div class="container" data-aos="fade-up">

          <div class="row">
              <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                  <img src="upload/pic/nh5.jpg" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                  <h3>Profil Sekolah SMK Nurul Huda Losari</h3>
                  <p class="fst-italic">
                      SMK Nurul Huda Losari adalah Sekolah Menengah Kejuaran bidang Komputer yang berlokasi di Desa Kalibuntu Pengasinan Jl. Agus Miftah No. 72B Kecamatan Losari, Kabupaten Brebes, Jawa Tengah 52255.
                  </p>
                  <ul>
                      <li><i class="bi bi-check-circle"></i> Email : smk_nuha@yahoo.com </li>
                      <li><i class="bi bi-check-circle"></i> Telepon : (0283)3315394 - 087729543884 </li>
                      <li><i class="bi bi-check-circle"></i> NPSN : 20341374 | NSS : 402032910037 </li>
                  </ul>
                  <p>
                      Website Referensi : www.smknuha.wordpress.com
                  </p>

              </div>
          </div>

      </div>
  </section><!-- End About Section -->

  <!-- ======= Popular Courses Section ======= -->
  <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

          <div class="section-title">
              <h2>Pengumuman</h2>
              <p>Hasil Seleksi</p>
          </div>

          <div class="row" data-aos="zoom-in" data-aos-delay="100">
              <?php
                include "lib/koneksi.php";
                $no = 1;
                $kueri = mysqli_query($con, "SELECT DISTINCT periode, tgl_daftar, status_penilaian FROM tbl_penilaian");
                while ($kls = mysqli_fetch_array($kueri)) {
                ?>
                  <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                      <div class="course-item">
                          <img src="upload/pic/nh6.jpg" class="img-fluid" alt="...">
                          <div class="course-content">

                              <h3><a href="homepage.php?module=detail&tgl_daftar=<?php echo $kls['tgl_daftar']; ?>&periode=<?= $kls['periode']; ?>">Penilaian <?php echo $kls['periode']; ?></a></h3>
                              <p><span>Status : <?php echo $kls['status_penilaian']; ?></span>
                              <p class="description">TGL : <?php echo $kls['tgl_daftar']; ?></p>
                              </p>
                          </div>
                      </div>
                  </div> <!-- End Course Item-->
              <?php } ?>
          </div>
      </div>
  </section><!-- End Popular Courses Section -->