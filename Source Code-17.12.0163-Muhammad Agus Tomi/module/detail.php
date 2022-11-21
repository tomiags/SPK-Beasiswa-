<?php
$priode = $_GET['periode'];
$tgl = $_GET['tgl_daftar'];
$date = date('Y');
include "lib/koneksi.php";
?>
<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Detail Perangkingan</h2>
            <!-- <p>Dalam perhitungan ini, aspek yang dinilai yaitu 25% nilai dari Pengetahuan Siswa, 25% nilai dari Keterampilan Siswa, 30% nilai dari Tugas Sekolah, 10% nilai dari Sikap Sosial dan 10% nilai dari Sikap Spiritual.</p> -->
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="module/penilaian/aksi_edit.php" method="post">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Periode Penilaian<span class="required">*</span>
                        </label>
                        <input type="text" class="form-control" name="priode" placeholder="" value="<?= $priode; ?>" readonly>
                    </div>
                </form>
            </div>
            <div class="card-box table-responsive">
                <br>
                <H3>DAFTAR PENERIMA BEASISWA</H3>
                <table id="datatable" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Murid</th>
                            <th>Kelas</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $queryv = mysqli_query($con, "SELECT DISTINCT pnl.nilai_v,pnd.nama_murid,pnd.kelas_murid,pnl.tgl_daftar FROM tbl_penilaian pnl LEFT JOIN tbl_murid pnd ON pnl.nis_murid = pnd.nis_murid WHERE pnl.periode = $priode AND pnl.tgl_daftar='$tgl' GROUP BY pnd.nama_murid ORDER BY pnl.nilai_v DESC LIMIT 5");
                        while ($v = mysqli_fetch_array($queryv)) {
                            $hasil = number_format($v['nilai_v'], 4);

                            $no++;
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?php echo $v['nama_murid']; ?></td>
                                <td><?php echo $v['kelas_murid']; ?></td>
                                <td>Menerima Beasiswa</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="ln_solid"></div>
            <div class="item form-group">
                <?php
                include "lib/koneksi.php";
                $no = 1;
                $kueriSiswa = mysqli_query($con, "SELECT DISTINCT periode,status_penilaian,tgl_daftar FROM tbl_penilaian WHERE tgl_daftar='$tgl'");
                while ($kat = mysqli_fetch_array($kueriSiswa)) {
                ?>
                   <?php } ?>
            </div>
            <div class="item form-group">
                <div class="">
                    <a href="homepage.php?module=hasil" target="_BLANK" class="btn btn-buy btn-block btn-round btn-primary">KEMBALI KE HOME</a>
                </div>
            </div>
            </form>