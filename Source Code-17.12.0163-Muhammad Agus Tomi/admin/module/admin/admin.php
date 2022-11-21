<?php
if (isset($_POST["admin"])) {
    if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
        echo "<center>Untuk mengakses modul anda harus login<br>";
        echo "<a href=../../login.php><b>LOGIN</b></a></center>";
    } else {
        $id_adm = $_POST['id_admin'];
        $Nama_admin = $_POST['nama_admin'];
        $Username = $_POST['username'];
        $Email_admin = $_POST['email_admin'];
        $No_tlp = $_POST['no_tlp'];
        $Tingkatan = $_POST['tingkatan'];

        $x=$_POST['foto_admin'];

        $foto         =$_FILES['gambar']['tmp_name'];
        $foto_name     =$_FILES['gambar']['name'];
        $acak        = rand(1,99);
        $tujuan_foto = $acak.$foto_name;
        $tempat_foto = 'img/'.$tujuan_foto;

    if (!$foto==""){
        $buat_foto=$tujuan_foto;
        $d = 'img/'.$x;
        @unlink ("$d");
        copy ($foto,$tempat_foto);
    }else{
        $buat_foto=$x;
    }
        $queryEditt = mysqli_query($con, "UPDATE tbl_admin SET nama_admin='$Nama_admin',username='$Username',email_admin='$Email_admin',no_tlp='$No_tlp',tingkatan='$Tingkatan',foto_admin='$buat_foto' WHERE id_admin='$id_adm'");
        if ($queryEditt) {
            echo "<script>alert('Data Diri User $nama_admin berhasil di edit '); window.location = 'index.php?module=madmin';</script>";
        } else {
            echo "<script>alert ('Data Diri User gagal di edit'); window.location = 'index.php?module=madmin';</script>";
        }
    }
}
if (isset($_POST["hapus"])) {
    if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
        echo "<center>Untuk mengakses modul anda harus login<br>";
        echo "<a href=../../login.php><b>LOGIN</b></a></center>";
    } else {
        $idAdmin = $_POST['id_admin'];

        $pilih = mysqli_query($con, "SELECT foto_admin FROM tbl_admin WHERE id_admin='$idAdmin'");
        $data = mysqli_fetch_array($pilih);
        $foto1 = $data['foto_admin'];
        $queryHapus = mysqli_query($con, "DELETE FROM tbl_admin WHERE id_admin='$idAdmin'");
        if ($queryHapus) {
            unlink("../upload/" . $foto1);
            echo "<script>alert ('Data User berhasil dihapus'); window.location = 'index.php?module=madmin';</script>";
        } else {
            echo "<script>alert ('Data User gagal dihapus'); window.location = 'index.php?module=madmin';</script>";
        }
    }
}
if (isset($_POST["tambah"])) {
    if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
        echo "<center>Untuk mengakses modul anda harus login<br>";
        echo "<a href=../../login.php><b>LOGIN</b></a></center>";
    } else {
        //untuk menangkap variabel nama kategori yang dikirim oleh form tambah
        $namaFile = $_FILES['foto_admin']['name'];
        $ukuranFile = $_FILES['foto_admin']['size'];
        $tipeFile = $_FILES['foto_admin']['type'];
        $tmpFile = $_FILES['foto_admin']['tmp_name'];

        $nama_admin = $_POST['nama_admin'];
        $tingkatan = $_POST['tingkatan'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $no_tlp = $_POST['no_tlp'];
        $email_admin = $_POST['email_admin'];
        //UNTUK MENYIMPAN GAMBAR
        $path = "../upload/" . $namaFile;
        if ($tipeFile == "image/jpeg" || $tipeFile == "image/png") {
            if ($ukuranFile <= 1000000) {
                if (move_uploaded_file($tmpFile, $path)) {
                    $querySimpan = mysqli_query($con, "INSERT INTO tbl_admin(nama_admin,tingkatan,username, password,email_admin,no_tlp,foto_admin) VALUES('$nama_admin','$tingkatan','$username','$password','$email_admin','$no_tlp','$namaFile')");
                    if ($querySimpan) {
                        echo "<script>alert ('Data User berhasil masuk'); window.location='index.php?module=madmin';</script>";
                        //jika query gagal maka akan tampil alert dan halaman akan kembali ke manajemen
                    } else {
                        echo "<script>alert ('Data User gagal dimasukan'); window.location = 'index.php?module=madmin</script>";
                    }
                }
            }
        }
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

                        <!-- kontent -->
                        <!-- Main content -->
                        <section class="content">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3 class="box-title">Daftar User Sistem</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                        <h4 class="m-t-0 header-title"><b>Manajemen Data User</b></h4>
                                        <hr />
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>
                                                        Nama
                                                    </th>
                                                    <th>
                                                        Username
                                                    </th>
                                                    <th>
                                                        Tingkatan
                                                    </th>
                                                    <th>
                                                        Email
                                                    </th>
                                                    <th>
                                                        Telepon
                                                    </th>
                                                    <th>
                                                        <center>Foto</center>
                                                    </th>
                                                    <th>
                                                        <center>Aksi</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include "../lib/koneksi.php";
                                                $no = 1;
                                                $kueriAdmin = mysqli_query($con, "SELECT * FROM tbl_admin");
                                                while ($kat = mysqli_fetch_array($kueriAdmin)) {
                                                    $tingkatan = $kat['tingkatan'];
                                                ?>
                                                    <tr>
                                                        <td width="50"><?php echo $no++; ?></td>
                                                        <td><?php echo $kat['nama_admin']; ?></td>
                                                        <td><?php echo $kat['username']; ?></td>
                                                        <td><?php echo $kat['tingkatan']; ?></td>
                                                        <td><?php echo $kat['email_admin']; ?></td>
                                                        <td><?php echo $kat['no_tlp']; ?></td>
                                                        <td class="text-center" width="50"><img src="../upload/<?php echo $kat['foto_admin']; ?>" height="40" width="40"></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-info waves-effect waves-light m-b-5" data-toggle="modal" data-target="#<?php echo $kat['username'];
                                                                                                                                                                            echo $kat['id_admin']; ?>"><i class="fa fa-edit m-r-5"></i> <span>Edit</span></button>
                                                                <form method="post">
                                                                    <input type="hidden" name="id_admin" value="<?php echo $kat['id_admin']; ?>">
                                                                    <button class="btn btn-danger waves-effect waves-light m-b-5" type="submit" name="hapus" onClick="return confirm('Anda yakin ingin menghapus data ini?')"> <i class="fa fa-trash m-r-5"></i><span>Hapus</span> </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-h idden="true" style="display: none;" id="<?php echo $kat['username'];
                                                                                                                                                                                        echo $kat['id_admin']; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title mt-0" id="myLargeModalLabel">Form Edit Data User</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                </div>
                                                                <form method="post" class="horizontal" action="#">
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="field-1" class="control-label">Nama</label>
                                                                                    <input type="hidden" name="id_admin" value="<?php echo $kat['id_admin']; ?>">
                                                                                    <input type="text" id="nama_admin" name="nama_admin" required="required" class="form-control" value="<?php echo $kat['nama_admin']; ?>" title="Nama User. Isikan hanya huruf." placeholder="Isikan Nama User !" maxlength="50">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="field-2" class="control-label">Username </label>
                                                                                    <input type="text" class="form-control" id="field-2" required="required" placeholder="admin" name="username" value="<?php echo $kat['username']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="field-3" class="control-label">Email</label>
                                                                                    <input type="text" class="form-control" id="field-3" required="required" placeholder="Address" name="email_admin" value="<?php echo $kat['email_admin']; ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="field-6" class="control-label">Tingkatan</label> <br>
                                                                                    <div id="jk_admin" class="btn-group" data-toggle="buttons">
                                                                                        <div class="form-check form-check-inline mr-1">
                                                                                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                                                <input class="form-check-input" id="inline-radio1" type="radio" value="Admin" name="tingkatan" <?php if ($tingkatan == "Admin") {
                                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                                } ?>>
                                                                                                <label class="form-check-label" for="inline-radio1">Admin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                                                        </div>
                                                                                        <div class="form-check form-check-inline mr-1">
                                                                                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                                                <input class="form-check-input" id="inline-radio2" type="radio" value="Kepsek" name="tingkatan" <?php if ($tingkatan == "Kepsek") {
                                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                                } ?>>
                                                                                                <label class="form-check-label" for="inline-radio2">Kepsek</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="field-5" class="control-label">Telepon</label>
                                                                                    <input type="number" class="form-control" id="field-5" required="required" placeholder="United States" name="no_tlp" value="<?php echo $kat['no_tlp']; ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="field-6" class="control-label">Foto</label>
                                                                                    <img class="media-object img-circle" alt="64x64" src="../upload/<?php echo $kat['foto_admin']; ?>" style="width: 64px; height: 64px;" required="required">
                                                                                </div>
                                                                                <div class="form-group"> 
                                                                                           <input type="file" class="form-control-file" id="foto" name="foto_admin" required="required">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group no-margin">
                                                                                    <label for="alamat_admin" class="control-label">Alamat</label>
                                                                                    <textarea class="form-control autogrow" required="required" id="alamat_admin" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;" name="alamat_admin"><?php echo $kat['alamat_admin']; ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div> -->
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                                                                        <button type="submit" class="btn btn-info waves-effect waves-light" name="admin">Simpan</button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- Akhir dari modal -->
                                                    </form>
                                                <?php }  ?>
                                            </tbody>
                                        </table>
                                        <button class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah User</button>
                                        <!-- <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button> -->
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title mt-0" id="myLargeModalLabel">Form Tambah User</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="#" method="post" enctype="multipart/form-data">
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                                        <input type="text" name="nama_admin" id="nama_admin" required="required" class="form-control col-md-7 col-xs-12" title="Nama. Isikan hanya huruf." placeholder="Isikan Nama!" maxlength="50">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tingkatan</label>
                                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                                        <div id="gender" class="btn-group" data-toggle="buttons">
                                                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                <input type="radio" name="tingkatan" value="Admin"> &nbsp; Admin &nbsp;
                                                            </label>
                                                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                <input type="radio" name="tingkatan" value="Kepsek"> Kepsek
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                                        <input type="text" id="last-name" name="username" required="required" class="form-control col-md-7 col-xs-12" title="Username." placeholder="Isikan Username!" maxlength="20">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                                        <input type="password" id="last-name" name="password" required="required" class="form-control col-md-7 col-xs-12" title="Password. " placeholder="Isikan Password!" maxlength="15">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                                        <input type="text" name="email_admin" id="email_admin" required="required" class="form-control col-md-7 col-xs-12" title="Alamat. " placeholder="Isikan Alamat!" maxlength="80">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Telepon</label>
                                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                                        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="number" name="no_tlp" required="required" title="No Telepon. Isikan hanya angka." placeholder="Isikan Nomor Telepon!" maxlength="15">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="foto" class="control-label col-md-3 col-sm-3 col-xs-12">Foto Profil</label>
                                                    <div class="col-md-9 col-sm-6 col-xs-12">
                                                        <input type="file" class="form-control-file" id="foto" name="foto_admin" required="required">
                                                    </div>
                                                </div>
                                                <hr />
                                                <div class="ln_solid"></div>
                                                <div class="form-group row">
                                                    <div class="col-md-9 col-sm-6 col-xs-12 col-md-offset-3">
                                                        <button class="btn btn-primary" type="button">Cancel</button>
                                                        <button type="submit" class="btn btn-success" name="tambah">Submit</button>
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