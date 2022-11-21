<?php
include "../lib/koneksi.php";
if (isset($_POST["kirim"])) {
    if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
        echo "<center>Untuk mengakses modul anda harus login<br>";
        echo "<a href=../../login.php><b>LOGIN</b></a></center>";
    } else {
        include "../lib/koneksi.php";
        $id_admin = $_POST['id_admin'];
        $nama_admin = $_POST['nama_admin'];
        $username = $_POST['username'];
        $email_admin = $_POST['email_admin'];
        $no_tlp = $_POST['no_tlp'];
        $queryEdit = mysqli_query($con, "UPDATE tbl_admin SET nama_admin='$nama_admin',username ='$username',email_admin ='$email_admin',no_tlp ='$no_tlp' WHERE id_admin='$id_admin'");
        if ($queryEdit) {
            echo "<script>alert('Data Diri User $nama_admin berhasil di edit '); window.location = 'index.php?module=profile';</script>";
        } else {
            echo "<script>alert ('Data Diri User gagal di edit'); window.location = 'index.php?module=profile';</script>";
        }
    }
}
if (isset($_POST["fotos"])) {
    if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
        echo "<center>Untuk mengakses modul anda harus login<br>";
        echo "<a href=../../login.php><b>LOGIN</b></a></center>";
    } else {
        include "../lib/koneksi.php";
        $namaFile = $_FILES['foto_admin']['name'];
        $ukuranFile = $_FILES['foto_admin']['size'];
        $tipeFile = $_FILES['foto_admin']['type'];
        $tmpFile = $_FILES['foto_admin']['tmp_name'];
        $id_admin = $_SESSION['id_admin'];
        $path = "../upload/" . $namaFile;
        if ($tipeFile == "image/jpeg" || $tipeFile == "image/png") {
            if ($ukuranFile <= 100000000) {
                if (move_uploaded_file($tmpFile, $path)) {
                    $queryEdit = mysqli_query($con, "UPDATE tbl_admin SET foto_admin ='$namaFile' WHERE id_admin='$id_admin'");
                    if ($queryEdit) {
                        echo "<script>alert('Data Foto Profil User berhasil di edit '); window.location = 'index.php?module=profile';</script>";
                    } else {
                        echo "<script>alert ('Data Foto Profil User gagal di edit'); window.location = 'index.php?module=profile';</script>";
                    }
                }
            }
        }
    }
}
?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
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
                                <div class="col-12">
                                    <div class="card-body border-bottom">
                                        <div class="fro_profile">
                                            <div class="row">
                                                <div class="col-lg-4 mb-3 mb-lg-0">
                                                    <div class="fro_profile-main">
                                                        <div class="fro_profile-main-pic">
                                                            <?php
                                                            include "../lib/koneksi.php";
                                                            @session_start();
                                                            $id_admin = $_SESSION['id_admin'];
                                                            $kueriadmin = mysqli_query($con, "SELECT * FROM tbl_admin where id_admin='$id_admin'");
                                                            while ($kat = mysqli_fetch_array($kueriadmin)) {
                                                            ?>
                                                                <img src="../upload/<?php echo $kat['foto_admin']; ?>" alt="user" class="rounded-circle img-thumbnail mb-1">
                                                                <span class="fro-profile_main-pic-change">
                                                                    <i class="fas fa-camera" data-toggle="modal" data-target="#panel-modal"></i>
                                                                </span>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="card-box table-responsive text-left">
                                                                    <h3 class="fro_user-name">Hai, <?php echo $kat['nama_admin']; ?></h3>
                                                                    <table border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><strong>Nama</strong></td>
                                                                                <td>&nbsp;&nbsp;&nbsp;:</td>
                                                                                <td><span class="m-l-15"><?php echo $kat['nama_admin']; ?></span></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><strong>Telepon</strong></td>
                                                                                <td>&nbsp;&nbsp;&nbsp;:</td>
                                                                                <td><span class="m-l-15"><?php echo $kat['no_tlp']; ?></span></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><strong>Level</strong></td>
                                                                                <td>&nbsp;&nbsp;&nbsp;:</td>
                                                                                <td><span class="m-l-15"><?php echo $kat['tingkatan']; ?></span></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <hr />
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="submit" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#panel-modal">Ubah Foto</button>
                                                                        <button type="submit" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Ubah Profil</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <hr />
                                                </div>
                                                <!--end col-->
                                            <?php } ?>

                                            <div class="col-lg-8 mb-3 mb-lg-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="seling-report">
                                                            <h3 class="seling-data mb-1">Fitur-fitur User</h3>
                                                            <hr />
                                                            <div class="panel-body">
                                                                <ol>
                                                                    <li>
                                                                       Admin dapat menginputkan data murid calon penerima beasiswa.
                                                                    </li>
                                                                    <li>
                                                                      Admin dapat mengubah atau menghapus data murid calon penerima beasiswa.
                                                                    </li>
                                                                    <li>
                                                                    Admin dapat melakukan print-out data murid calon penerima beasiswa.
                                                                    </li>
                                                                    <li>
                                                                    	Admin dapat melakukan input data penilaian penerima beasiswa.
                                                                    </li>
                                                                    <li>
                                                                  	Admin dapat mengubah atau menghapus data penilaian penerima beasiswa.
                                                                    </li>
                                                                    <li>
                                                                     Admin dapat melakukan print-out data penilaian penerima beasiswa.
                                                                    </li>
                                                                    <li>
                                                                   	Admin dapat mengubah atau menghapus hasil penilaian penerima beasiswa.
                                                                    </li>
                                                                    <li>
                                                                  	Admin dapat melakukan print-out hasil penilaian penerima beasiswa.
                                                                    </li>
                                                                    <li>
                                                                    	Admin dapat mengubah data diri atau mengganti password.
                                                                    </li>
                                                                    <li>
                                                                   Kepsek dapat melakukan manajemen admin seperti menginputkan, mengubah, atau menghapus data admin dalam sistem.
                                                                    </li>
                                                                    <li>
                                                                    Kepsek dapat mengubah data kriteria penilaian penerima beasiswa.
                                                                    </li>
                                                                    <li>
                                                                    Kepsek dapat mengubah bobot kriteria penilaian penerima beasiswa.
                                                                    </li>
                                                                    <li>
                                                                    Kepsek dapat mengubah atau menghapus hasil penilaian penerima beasiswa.
                                                                    </li>
                                                                    <li>
                                                                    Kepsek dapat melakukan print-out hasil penilaian penerima beasiswa.
                                                                    </li>
                                                                    <li>
                                                                    Kepsek dapat mengubah data diri atau mengganti password.
                                                                    </li>
                                                                </ol>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-5 align-item-center">
                                                        <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                                            <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                                            </div>
                                                            <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                                            </div>
                                                        </div>
                                                        <canvas id="pro-doughnut" height="59" style="display: block; width: 99px; height: 59px;" width="99" class="chartjs-render-monitor"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </div>
                                        <!--end f_profile-->
                                    </div>
                                    <!--end card-body-->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-4">
                                                        <div class="p-20">
                                                            <div class="blog-post m-b-30">
                                                                <div class="post-image">
                                                                    <img src="upload/fly.png" alt="" class="img-responsive">
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end row -->


                                        </div>
                                    </div> <!-- end row -->


                                </div>
                                <!-- end col -->

                            </div>
                    </div>
                </div>
            </div>
            <!-- End row -->

        </div> <!-- container -->

    </div> <!-- content -->

</div>
<?php
include "../lib/koneksi.php";
@session_start();
$id_admin = $_SESSION['id_admin'];
$kueriadmin = mysqli_query($con, "SELECT * FROM tbl_admin where id_admin='$id_admin'");
while ($kat = mysqli_fetch_array($kueriadmin)) {
    $tingkatan = $kat['tingkatan'];
?>
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mt-0" id="myLargeModalLabel">Form Edit Profil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Nama admin</label>
                                    <input type="hidden" name="id_admin" value="<?php echo $kat['id_admin']; ?>">
                                    <input type="text" id="nama_admin" name="nama_admin" class="form-control" value="<?php echo $kat['nama_admin']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Username admin</label>
                                    <input type="text" class="form-control" id="field-2" placeholder="admin" name="username" value="<?php echo $kat['username']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Telepon</label>
                                    <input data-parsley-type="number" type="text" class="form-control" id="field-5" placeholder="United States" name="no_tlp" value="<?php echo $kat['no_tlp']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Email</label>
                                    <input type="text" class="form-control" id="field-2" placeholder="admin" name="email_admin" value="<?php echo $kat['email_admin']; ?>">
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">Jenis Kelamin</label> <br>
                                    <div id="jk_admin" class="btn-group" data-toggle="buttons">
                                        <div class="form-check form-check-inline mr-1">
                                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input class="form-check-input" id="inline-radio1" type="radio" value="Laki Laki" name="jk_admin" <?php if ($jk_admin == "Laki Laki") {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    } ?>>
                                                <label class="form-check-label" for="inline-radio1">Laki-Laki&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input class="form-check-input" id="inline-radio2" type="radio" value="Perempuan" name="jk_admin" <?php if ($jk_admin == "Perempuan") {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    } ?>>
                                                <label class="form-check-label" for="inline-radio2">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Foto admin</label>
                                    <img class="media-object img-circle" alt="72x72" src="../upload/<?php echo $kat['foto_admin']; ?>" style="width: 72px; height: 72px;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Tingkatan</label>
                                    <input type="text" class="form-control" id="field-2" placeholder="admin" name="tingkatan" value="<?php echo $kat['tingkatan']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light" name="kirim">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal -->


    <!-- Panel modal -->
    <div id="panel-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content p-0 b-0">
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="panel-title">
                            <center>Form Ubah Foto Profil</center>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="foto" class="control-label col-md-3 col-sm-3 col-xs-12">Foto Profil</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" class="form-control-file" id="foto" name="foto_admin">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success" name="fotos">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div>