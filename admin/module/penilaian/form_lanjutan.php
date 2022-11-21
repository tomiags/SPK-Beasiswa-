<?php
include "../lib/koneksi.php";
$date = date('Y');
?>
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
                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="module/penilaian/aksi_simpan.php" method="post">
                                        <div class="card-box table-responsive">
                                            <h2 class="m-t-0 header-title"><b>Form Penilaian</b></h2>
                                            <hr />
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                                                    <h4 class="m-t-0 header-title">Periode <span class="required">*</span></h4>
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="text" class="form-control" name="priode" placeholder="" value="<?= date('Y'); ?>" readonly>
                                                </div>
                                            </div>
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Murid</th>
                                                        <?php
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
                                                    $querykar = mysqli_query($con, "SELECT * FROM tbl_murid");
                                                    while ($kar = mysqli_fetch_array($querykar)) {
                                                        $id = $kar['nis_murid'];
                                                        $no++;
                                                    ?>
                                                        <tr>
                                                            <td><?= $no; ?></td>
                                                            <td><?php echo $kar['nama_murid']; ?></td>
                                                            <?php
                                                            $querykriteria = mysqli_query($con, "SELECT * FROM tbl_kriteria");
                                                            while ($krt = mysqli_fetch_array($querykriteria)) {
                                                                $id_krt = $krt['id_kriteria'];
                                                            ?>

                                                                <td>
                                                                    <div class="m-b-0">
                                                                        <select name="nilai[<?php echo $id; ?>][<?php echo $id_krt; ?>]" id="" class="form-control" data-style="btn-custom">
                                                                            <option value="0">-- Pilih --</option>
                                                                            <?php
                                                                            $queryparam = mysqli_query($con, "SELECT * FROM tbl_parameter where id_kriteria = $id_krt");
                                                                            while ($param = mysqli_fetch_array($queryparam)) {
                                                                                $nama_param = $param['nama_parameter'];
                                                                                $nilai_param = $param['nilai_parameter'];
                                                                            ?>
                                                                                <option value="<?= $nilai_param ?>"><?= $nama_param ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            <?php } ?>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <div class="ln_solid"></div>
                                            <div class="item form-group">
                                                <div class="col-md-12 col-sm-12 offset-md-3">
                                                    <button type="submit" class="btn btn-block btn-purple waves-effect waves-light">Proses Penilaian </button>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>