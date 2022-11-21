<?php
include "../lib/koneksi.php";
if (isset($_POST["hapus"])) {
  //untuk menangkap variabel nama admin yang dikirim oleh button hapus
  $periode = $_POST['periode'];
  $tgl_daftar = $_POST['tgl_daftar'];
  $queryHapus = mysqli_query($con, "DELETE FROM tbl_penilaian WHERE tgl_daftar='$tgl_daftar' AND periode='$periode'");
  if ($queryHapus) {
    echo "<script>alert ('Data Penilaian yang dipilih berhasil dihapus'); window.location = 'index.php?module=cetak';</script>";
  } else {
    echo "<script>alert ('Data Penilaian yang dipilih gagal dihapus'); window.location = 'index.php?module=cetak';</script>";
  }
}
?>
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
              <!-- end row -->
              <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title"><b>Rekap Laporan</b></h4>
                    <hr />
                    <table id="datatable-buttons" class="table table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>
                            Tanggal Penilaian
                          </th>
                          <th>
                            Periode Penilaian
                          </th>
                          <th>
                            Status Penilaian
                          </th>
                          <th>
                            Aksi
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include "../lib/koneksi.php";
                        $no = 1;
                        $kueriSiswa = mysqli_query($con, "SELECT DISTINCT periode,status_penilaian,tgl_daftar FROM tbl_penilaian");
                        while ($kat = mysqli_fetch_array($kueriSiswa)) {
                        ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $kat['tgl_daftar']; ?></td>
                            <td><?php echo $kat['periode']; ?></td>
                            <td><?php echo $kat['status_penilaian']; ?></td>
                            <td>
                              <form method="post">
                                <a href="../lib/print/cetak_laporan.php?tgl_daftar=<?php echo $kat['tgl_daftar']; ?>&periode=<?= $kat['periode']; ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light m-b-5"><i class="fa fa-print m-r-5"></i>Cetak</button></a>
                                <a href="index.php?module=ubah_penilaian&tgl_daftar=<?= $kat['tgl_daftar']; ?>&periode=<?= $kat['periode']; ?>" class="btn btn-success btn-sm waves-effect waves-light m-b-5"><i class="fa fa-edit m-r-5"></i>Ubah</a>
                                <input type="hidden" name="tgl_daftar" value="<?php echo $kat['tgl_daftar']; ?>">
                                <input type="hidden" name="periode" value="<?php echo $kat['periode']; ?>">
                                <button class="btn btn-danger btn-sm waves-effect waves-light m-b-5" type="submit" name="hapus" onClick="return confirm('Anda yakin ingin menghapus data ini?')"> <i class="fa fa-trash-alt"></i>Hapus</button>
                              </form>
                            </td>
                          </tr>

                  </div>
                </div>
              </div>
              </form>
            <?php }  ?>
            </tbody>
            </table>

          </div>
        </div>


      </div>
    </div>
    </section>