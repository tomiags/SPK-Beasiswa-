<?php
$priode = $_GET['periode'];
$tgl_daftar = $_GET['tgl_daftar'];
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
                                    <div class="card-box table-responsive">
                                        <center>
                                            <h2>Form Edit Penilaian<small></small></h2>
                                        </center>
                                        <hr />
                                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="module/penilaian/aksi_edit.php" method="post">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Periode Penilaian<span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="text" class="form-control" name="priode" placeholder="" value="<?= $priode; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="hidden" class="form-control" name="tgl_daftar" placeholder="" value="<?= $tgl_daftar; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Murid</th>
                                                            <?php
                                                            include "../lib/koneksi.php";
                                                            $querykriteria = mysqli_query($con, "SELECT nama_kriteria FROM tbl_kriteria");
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
                                                        $querykar = mysqli_query($con, "SELECT * FROM tbl_murid");
                                                        while ($kar = mysqli_fetch_array($querykar)) {
                                                            $id = $kar['nis_murid'];
                                                            $no++;
                                                        ?>
                                                            <tr>
                                                                <td><?= $no; ?></td>
                                                                <td><?php echo $kar['nama_murid']; ?></td>
                                                                <?php
                                                                include "../lib/koneksi.php";
                                                                $querykriteria = mysqli_query($con, "SELECT * FROM tbl_kriteria");
                                                                while ($krt = mysqli_fetch_array($querykriteria)) {
                                                                    $id_krt = $krt['id_kriteria'];
                                                                    $queruynilaiparam = mysqli_query($con, "SELECT nilai_kriteria FROM tbl_penilaian where nis_murid = $id and id_kriteria = $id_krt AND periode  = $priode");
                                                                    $nilai = mysqli_fetch_array($queruynilaiparam);
                                                                ?>

                                                                    <td>
                                                                        <select name="nilai[<?php echo $id; ?>][<?php echo $id_krt; ?>]" id="" class="form-control">

                                                                            <option value="0" <?php if ($nilai['nilai_kriteria'] == "0") {
                                                                                                    echo "selected";
                                                                                                } ?>>------ Pilih ------</option>
                                                                            <?php
                                                                            include "../lib/koneksi.php";

                                                                            echo $nilai;
                                                                            $queryparam = mysqli_query($con, "SELECT * FROM tbl_parameter where id_kriteria = $id_krt");
                                                                            while ($param = mysqli_fetch_array($queryparam)) {
                                                                                $nama_param = $param['nama_parameter'];
                                                                                $nilai_param = $param['nilai_parameter'];
                                                                            ?>

                                                                                <option value="<?= $nilai_param ?>" <?php if ($nilai['nilai_kriteria'] == $nilai_param) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>><?= $nama_param ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </td>

                                                                <?php } ?>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="ln_solid"></div>
                                            <button type="submit" class="btn btn-block btn--md btn-info waves-effect waves-light">Simpan Perubahan</button>
                                    </div>
                                </div>

                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>