<?php
require '../lib/koneksi.php';
@session_start();
if (empty($_SESSION['id_admin'])) {
    echo "<script>alert ('Maaf, Hak akses tidak ditemukan, silahkan LOGIN terlebih dahulu.'); window.location='index.php';</script>";
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
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="p-20">
                                                    <?php
                                                    $id_admin = $_SESSION['id_admin'];
                                                    $kueriAd = mysqli_query($con, "SELECT * FROM tbl_admin WHERE id_admin = '$id_admin'");
                                                    while ($kat = mysqli_fetch_array($kueriAd)) {
                                                    ?>
                                                        <form action="module/home/editpassword.php" data-parsley-validate novalidate method="post" enctype="multipart/form-data">
                                                            <input id="id_admin" type="hidden" name="id_admin" value="<?php echo $kat['id_admin']; ?>">
                                                            <div class="form-group">
                                                                <label for="password_admin">Password Saat Ini<span class="text-danger">*</span></label>
                                                                <input maxlength="12" id="password_admin" type="password" title="Isikan Password saat ini" placeholder="Isikan Password saat ini" required class="form-control" name="password_admin">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password_admin">Password Baru<span class="text-danger">*</span></label>
                                                                <input maxlength="12" id="password_baru_admin" type="password" title="Isikan Password baru" placeholder="Isikan Password baru" required class="form-control" name="password_baru_admin">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="konfirmasi_password">Konfirmasi Password <span class="text-danger">*</span></label>
                                                                <input maxlength="12" type="password" required placeholder="Konfirmasi Password baru" title="Konfirmasi Password baru" class="form-control" id="konfirmasi_password" name="konfirmasi_password">
                                                            </div>
                                                            <div class="form-group text-right m-b-0">
                                                                <button class="btn btn-primary waves-effect waves-light" type="submit">
                                                                    Simpan
                                                                </button>
                                                                <a href="index.php?module=home">
                                                                    <button type="button" class="btn btn-dark waves-effect m-l-5">
                                                                        Kembali ke Home
                                                                    </button>
                                                                </a>
                                                            </div>
                                                        </form>
                                                    <?php }  ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end ard-box -->
                                </div><!-- end col-->
                            </div><!-- end row -->
                    </div> <!-- end container -->
                </div><!-- end wrapper -->
            </div>