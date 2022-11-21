<!-- Content Wrapper. Contains page content -->
<div class="page-content">
  <div class="container-fluid">
    <div class="row ">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="float-right">
              <i class="mdi mdi-account font-24 text-secondary"></i>
            </div>
            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">

                    <div class="card">
                      <div class="card-header">
                        <h1 class="card-title">Penilaian</h1>
                        <!-- <hr /> -->
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <!-- Button trigger modal -->
                        <a href="index.php?module=form_lanjutan" class="btn btn-primary mb-4">TAMBAH</a>
                        <hr />
                        <div class="row">

                          <?php
                          $no = 0;
                          include "../lib/koneksi.php";
                          $querynilai = mysqli_query($con, "SELECT DISTINCT periode,status_penilaian,tgl_daftar FROM tbl_penilaian");
                          while ($nl = mysqli_fetch_array($querynilai)) {
                          ?>


                            <div class="col-lg-4 ">
                              <div class="card card-body text-center">
                                <h4 class="card-title mt-0">Penilaian <?= $nl['tgl_daftar']; ?> / <?= $nl['periode']; ?> </h4>
                                <span class="info-box-number text-center text-muted mb-0"><?= $nl['status_penilaian']; ?></span><br>
                                <a href="index.php?module=detail_penilaian&tgl_daftar=<?php echo $nl['tgl_daftar']; ?>&periode=<?= $nl['periode']; ?>&status_penilaian=<?= $nl['status_penilaian']; ?>" class="btn btn-primary" <?php if ($nl['status_penilaian'] == "belum selesai") {
                                                                                                                                                                                                                                  echo "hidden";
                                                                                                                                                                                                                                } ?>>Lihat Detail Penilaian</a>
                              </div>
                              <!--end card-->
                            </div>
                            <!--end col-->
                          <?php } ?>
                        </div>

                        <!-- <a href="admin.php?module=lanjut_penilaian&periode=<?= $nl['periode']; ?>&status_penilaian=<?= $nl['status_penilaian']; ?>" class="btn btn-inverse" <?php if ($nl['status_penilaian'] == "sudah selesai") {
                                                                                                                                                                                    echo "hidden";
                                                                                                                                                                                  } ?>>Lanjutkan..</a> -->

                      </div>
                      <!-- <a href="dashboard.php?module=rekomendasi&tgl_penilaian=<?php echo $nilai['tgl_penilaian']; ?>&ke=<?php echo $nilai['ke']; ?>&keterangan=<?php echo $nilai['keterangan']; ?>" class="more-39291">
                              <button type="button" class="btn btn-info btn-rounded waves-effect m-t-10 waves-light">Lihat Rekomendasi</button></a> -->



                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
          </div>
        </div>


        </section>