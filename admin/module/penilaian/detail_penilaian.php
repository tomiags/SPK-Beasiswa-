<?php
$status = $_GET['status_penilaian'];
$priode = $_GET['periode'];
$tgl = $_GET['tgl_daftar'];
$date = date('Y');
include "../lib/koneksi.php";
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
                            <div class="row">
                                <div class="col-sm-12">
                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="module/penilaian/aksi_edit.php" method="post">
                                        <div class="item form-group">
                                            <h3 class="font-32 font-weight-bold mt-0 mb-4">Detail Penilaian</h3>
                                            <hr />
                                            <h4 class="header-title mt-0">Periode Penilaian<span class="required">*</span></h4>
                                            <div class="col-md-12 col-sm-12">
                                                <input type="text" class="form-control" name="priode" placeholder="" value="<?= $priode; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="card-box table-responsive">
                                            <br>
                                            <h3 class="">MATRIKS PENILAIAN</h3>
                                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Murid</th>
                                                        <?php
                                                        include "../lib/koneksi.php";
                                                        $querykriteria = mysqli_query($con, "SELECT nama_kriteria FROM tbl_kriteria WHERE tgl_ubah<'$tgl'");
                                                        while ($krt = mysqli_fetch_array($querykriteria)) {
                                                        ?>

                                                            <th><?php echo $krt['nama_kriteria']; ?></th>

                                                        <?php } ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    include "../lib/koneksi.php";
                                                    $querykar = mysqli_query($con, "SELECT * FROM tbl_murid WHERE tgl_update<'$tgl'");
                                                    while ($kar = mysqli_fetch_array($querykar)) {
                                                        $id = $kar['nis_murid'];
                                                        $no++;
                                                    ?>
                                                        <tr>
                                                            <td><?= $no; ?></td>
                                                            <td><?php echo $kar['nama_murid']; ?></td>
                                                            <?php
                                                            include "../lib/koneksi.php";
                                                            $querykriteria = mysqli_query($con, "SELECT * FROM tbl_kriteria WHERE tgl_ubah<'$tgl'");
                                                            while ($krt = mysqli_fetch_array($querykriteria)) {
                                                                $id_krt = $krt['id_kriteria'];
                                                                $queruynilaiparam = mysqli_query($con, "SELECT nilai_kriteria FROM tbl_penilaian where nis_murid = $id and id_kriteria = $id_krt AND periode  = $priode ");
                                                                $nilai = mysqli_fetch_array($queruynilaiparam);
                                                            ?>

                                                                <td>
                                                                    <?php
                                                                    include "../lib/koneksi.php";
                                                                    $queryparam = mysqli_query($con, "SELECT * FROM tbl_parameter where id_kriteria = $id_krt AND nilai_parameter = $nilai[nilai_kriteria]");
                                                                    $param = mysqli_fetch_array($queryparam);
                                                                    ?>
                                                                    <input type="text" class="form-control" value="<?= $param['nama_parameter']; ?>" readonly>
                                                                </td>

                                                            <?php } ?>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-box table-responsive">
                                            <br>
                                            <H3>MATRIKS NORMALISASI</H3>
                                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Siswa</th>
                                                        <?php
                                                        include "../lib/koneksi.php";
                                                        $querykriteria = mysqli_query($con, "SELECT nama_kriteria FROM tbl_kriteria WHERE tgl_ubah<'$tgl'");
                                                        while ($krt = mysqli_fetch_array($querykriteria)) {
                                                        ?>

                                                            <th><?php echo $krt['nama_kriteria']; ?></th>

                                                        <?php } ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    include "../lib/koneksi.php";
                                                    $querykar = mysqli_query($con, "SELECT * FROM tbl_murid WHERE tgl_update<'$tgl'");
                                                    while ($kar = mysqli_fetch_array($querykar)) {
                                                        $id = $kar['nis_murid'];
                                                        $no++;
                                                    ?>
                                                        <tr>
                                                            <td><?= $no; ?></td>
                                                            <td><?php echo $kar['nama_murid']; ?></td>
                                                            <?php
                                                            include "../lib/koneksi.php";
                                                            $querykriteria = mysqli_query($con, "SELECT * FROM tbl_kriteria WHERE tgl_ubah<'$tgl'");
                                                            while ($krt = mysqli_fetch_array($querykriteria)) {
                                                                $id_krt = $krt['id_kriteria'];
                                                                $queruynormalisasi = mysqli_query($con, "SELECT nilai_normalisasi FROM tbl_penilaian where nis_murid = $id and id_kriteria = $id_krt AND  periode  = $priode ");
                                                                $nilai_normalisasi = mysqli_fetch_array($queruynormalisasi);
                                                                $hasil1 = number_format($nilai_normalisasi['nilai_normalisasi'], 4);
                                                            ?>

                                                                <td>
                                                                    <input type="text" class="form-control" value="<?= $hasil1; ?>" readonly>
                                                                </td>

                                                            <?php } ?>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-box table-responsive">
                                            <br>
                                            <H3>RANKING NILAI</H3>
                                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Murid</th>
                                                        <th>Hasil</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    $queryv = mysqli_query($con, "SELECT DISTINCT pnl.nilai_v,pnd.nama_murid,pnl.tgl_daftar FROM tbl_penilaian pnl LEFT JOIN tbl_murid pnd ON pnl.nis_murid = pnd.nis_murid WHERE pnl.periode = $priode AND pnl.tgl_daftar='$tgl' GROUP BY pnd.nama_murid ORDER BY pnl.nilai_v DESC");
                                                    while ($v = mysqli_fetch_array($queryv)) {
                                                        $hasil = number_format($v['nilai_v'], 4);

                                                        $no++;
                                                    ?>
                                                        <tr>
                                                            <td><?= $no; ?></td>
                                                            <td><?php echo $v['nama_murid']; ?></td>
                                                            <td>
                                                                <input type="text" class="form-control" value="<?php echo $hasil; ?>" readonly>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="item form-group">
                                            <!-- <div class="">
                                <a href="print.php?status_penilaian=<?= $status; ?>&periode=<?= $priode; ?>" target="_BLANK" class="btn btn-round btn-success btn-flat">cetak laporan tervalidasi</a>
                            </div> -->

                                        <a href="../lib/print/cetak_penilaian.php" class="more-39291">
                                        <button type="button" class="btn btn-warning btn-bordered waves-effect w-md waves-light m-b-5"><i class="fa fa-print m-r-5"></i> &nbsp;Cetak</button> </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>