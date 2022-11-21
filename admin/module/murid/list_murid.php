<?php
if (isset($_POST["admin"])) {
    if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
        echo "<center>Untuk mengakses modul anda harus login<br>";
        echo "<a href=../../login.php><b>LOGIN</b></a></center>";
    } else {
        $nis_murid = $_POST['nis_murid'];
        $nama_murid = $_POST['nama_murid'];
        $kelas_murid = $_POST['kelas_murid'];
        $email_murid = $_POST['email_murid'];
        $alamat_murid = $_POST['alamat_murid'];
        $jenkel_murid = $_POST['jenkel_murid'];
        $no_tlp_murid = $_POST['no_tlp_murid'];
        $nama_wali = $_POST['nama_wali'];
        $pekerjaan_wali = $_POST['pekerjaan_wali'];
        $tgl_update = date("Y-m-d H:i:s");
        $foto_murid=$_POST['foto_murid'];

        $foto = $_FILES['foto_murid']['tmp_name'];
        $foto_name = $_FILES['foto_murid']['name'];
        $acak = rand(1,99);
        $tujuan_foto = $acak.$foto_name;
        $tempat_foto = 'img/'.$tujuan_foto;

    if (!$foto==""){
        $buat_foto=$tujuan_foto;
        $d = 'img/'.$foto_murid;
        @unlink ("$d");
        copy ($foto,$tempat_foto);
    }else{
        $buat_foto=$foto_murid;
    }
        $queryEditt = mysqli_query($con, "UPDATE tbl_murid SET nama_murid='$nama_murid',kelas_murid='$kelas_murid',email_murid='$email_murid',alamat_murid='$alamat_murid',foto_murid='$buat_foto',jenkel_murid='$jenkel_murid',no_tlp_murid='$no_tlp_murid',nama_wali='$nama_wali',pekerjaan_wali='$pekerjaan_wali',tgl_update='$tgl_update' WHERE nis_murid='$nis_murid'");
        if ($queryEditt) {
            echo "<script>alert('Data Diri Murid $nama_murid berhasil diubah '); window.location = 'index.php?module=murid';</script>";
        } else {
            echo "<script>alert ('Data Diri Murid gagal diubah, $nis_murid, $nama_murid, $kelas_murid, $email_murid, $alamat_murid, $jenkel_murid, $no_telp_murid'); window.location = 'index.php?module=murid';</script>";
        }
    }
}
if (isset($_POST["hapus"])) {
    $nis_murid = $_POST['nis_murid'];

    $queryHapus = mysqli_query($con, "DELETE FROM tbl_murid WHERE nis_murid='$nis_murid'");
    if ($queryHapus) {
      echo "<script>alert ('Data Murid yang dipilih berhasil dihapus'); window.location = 'index.php?module=murid';</script>";
    } else {
      echo "<script>alert ('Data Murid yang dipilih gagal dihapus'); window.location = 'index.php?module=murid';</script>";
    }
  }
if (isset($_POST["tambah"])) {
    if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
        echo "<center>Untuk mengakses modul anda harus login<br>";
        echo "<a href=../../login.php><b>LOGIN</b></a></center>";
    } else {
        $namaFile = $_FILES['foto_murid']['name'];
        $ukuranFile = $_FILES['foto_murid']['size'];
        $tipeFile = $_FILES['foto_murid']['type'];
        $tmpFile = $_FILES['foto_murid']['tmp_name'];

        $nis_murid = $_POST['nis_murid'];
        $nama_murid = $_POST['nama_murid'];
        $kelas_murid = $_POST['kelas_murid'];
        $jenkel_murid = $_POST['jenkel_murid'];
        $no_tlp_murid = $_POST['no_tlp_murid'];
        $email_murid = $_POST['email_murid'];
        $alamat_murid = $_POST['alamat_murid'];
        $nama_wali = $_POST['nama_wali'];
        $pekerjaan_wali = $_POST['pekerjaan_wali'];
        $tgl_update = date("Y-m-d H:i:s");
        //UNTUK MENYIMPAN GAMBAR
        $path = "../upload/" . $namaFile;
        if ($tipeFile == "image/jpeg" || $tipeFile == "image/png") {
            if ($ukuranFile <= 1000000) {
                if (move_uploaded_file($tmpFile, $path)) {
                    $querySimpan = mysqli_query($con, "INSERT INTO tbl_murid(nis_murid,nama_murid,kelas_murid,jenkel_murid,no_tlp_murid, email_murid,alamat_murid,foto_murid,nama_wali,pekerjaan_wali,tgl_update) VALUES('$nis_murid','$nama_murid','$kelas_murid','$jenkel_murid','$no_tlp_murid','$email_murid','$alamat_murid','$namaFile','$nama_wali','$pekerjaan_wali','$tgl_update')");
                    if ($querySimpan) {
                        echo "<script>alert ('Data Murid berhasil masuk'); window.location='index.php?module=murid';</script>";
                        //jika query gagal maka akan tampil alert dan halaman akan kembali ke manajemen
                    } else {
                        echo "<script>alert ('Data Murid gagal dimasukan'); window.location = 'index.php?module=murid</script>";
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
                                            <h3 class="box-title">Daftar Murid</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>NIS</th>
                                                            <th>Nama</th>
                                                            <th>Foto</th>
                                                            <th>Kelas</th>
                                                            <th>Nama Wali</th>
                                                            <th>Pekerjaan Wali</th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        include "../lib/koneksi.php";
                                                        $no = 1;
                                                        $kueriAdmin = mysqli_query($con, "SELECT * FROM tbl_murid");
                                                        while ($kat = mysqli_fetch_array($kueriAdmin)) {
                                                            $jenkel_murid = $kat['jenkel_murid'];
                                                        ?>
                                                            <tr>
                                                                <td width="50"><?php echo $no++; ?></td>
                                                                <td><?php echo $kat['nis_murid']; ?></td>
                                                                <td><?php echo $kat['nama_murid']; ?></td>
                                                                <td class="text-center" width="70"><img src="../upload/<?php echo $kat['foto_murid']; ?>" height="60" width="60"></td>
                                                                <td><?php echo $kat['kelas_murid']; ?></td>
                                                                <td><?php echo $kat['nama_wali']; ?></td>
                                                                <td><?php echo $kat['pekerjaan_wali']; ?></td>
                                                                <td><div class="btn-group">
                                                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#Detail<?php echo $kat['nis_murid']; ?>">
                                                                            &nbsp;&nbsp;Lihat Detail
                                                                        </button>
                                                                    </td>
                                                                <!-- <td class="text-center" width="50"><img src="../upload/<?php echo $kat['foto']; ?>" height="40" width="40"></td> -->
                                                                <td>
                                                                       <div class="btn-group">
                                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalEdit<?php echo $kat['nis_murid']; ?>">
                                                                            <i class="fa fa-edit btn-flat"></i>Edit
                                                                        </button>
                                                                
                                                                <form method="post">
                                                                    <input type="hidden" name="nis_murid" value="<?php echo $kat['nis_murid']; ?>">
                                                                    <button class="btn btn-danger" type="submit" name="hapus" onClick="return confirm('Anda yakin ingin menghapus data ini?')"> <i class="fa fa-trash m-r-5"></i>Hapus</button>
                                                                </form>
                                                                </td>
                                                            </tr>

                                                            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-h idden="true" style="display: none;" id="ModalEdit<?php echo $kat['nis_murid']; ?>">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title mt-0" id="myLargeModalLabel">Form Edit Data Diri Murid</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        </div>
                                                                        <form method="post" class="horizontal" action="#">
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label for="field-1" class="control-label">Nama Murid</label>
                                                                                            <input type="hidden" name="nis_murid" value="<?php echo $kat['nis_murid']; ?>">
                                                                                            <input type="text" id="nama_admin" name="nama_murid" required="required" class="form-control" value="<?php echo $kat['nama_murid']; ?>" title="Nama Admin. Isikan hanya huruf." placeholder="Isikan Nama Admin !" maxlength="50">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="field-6" class="control-label">Foto Murid</label>
                                                                                            <center><img class="media-object img-circle" alt="64x64" src="../upload/<?php echo $kat['foto_murid']; ?>" style="width: 64px; height: 64px;" required="required" disabled>
                                                                                           </div>
                                                                                           <div class="form-group"> 
                                                                                           <input type="file" class="form-control-file" id="foto" name="foto_murid" required="required"></center>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="field-2" class="control-label">Kelas</label>
                                                                                            <input type="text" class="form-control" id="field-2" required="required" placeholder="kelas" name="kelas_murid" value="<?php echo $kat['kelas_murid']; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="field-3" class="control-label">Email</label>
                                                                                            <input type="text" class="form-control" id="field-3" required="required" placeholder="Address" name="email_murid" value="<?php echo $kat['email_murid']; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                             <label for="field-6" class="control-label">Jenis Kelamin</label> <br>
                                                                                             <div id="jenkel_murid" class="btn-group" data-toggle="buttons">
                                                                                                <div class="form-check form-check-inline mr-1">
                                                                                                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                                                        <input class="form-check-input" id="inline-radio1" type="radio" value="L" name="jenkel_murid" <?php if ($jenkel_murid == "L") {
                                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                                        } ?>>
                                                                                                        <label class="form-check-label" for="inline-radio1">Laki-Laki&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                                                                </div>
                                                                                                <div class="form-check form-check-inline mr-1">
                                                                                                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                                                        <input class="form-check-input" id="inline-radio2" type="radio" value="P" name="jenkel_murid" <?php if ($jenkel_murid == "P") {
                                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                                        } ?>>
                                                                                                        <label class="form-check-label" for="inline-radio2">Perempuan</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="field-5" class="control-label">Telepon</label>
                                                                                            <input type="number" class="form-control" id="field-5" required="required" placeholder="United States" name="no_tlp_murid" value="<?php echo $kat['no_tlp_murid']; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="field-2" class="control-label">Nama Wali</label>
                                                                                            <input type="text" class="form-control" id="field-2" required="required" placeholder="namawali" name="nama_wali" value="<?php echo $kat['nama_wali']; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="field-3" class="control-label">Pekerjaan Wali</label>
                                                                                            <input type="text" class="form-control" id="field-3" required="required" placeholder="Address" name="pekerjaan_wali" value="<?php echo $kat['pekerjaan_wali']; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group no-margin">
                                                                                            <label for="alamat_admin" class="control-label">Alamat</label>
                                                                                            <textarea class="form-control autogrow" required="required" id="alamat_murid" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;" name="alamat_murid"><?php echo $kat['alamat_murid']; ?></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                                                                                <button type="submit" class="btn btn-info waves-effect waves-light" name="admin">Simpan</button>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- Akhir dari modal -->

                                                            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-h idden="true" style="display: none;" id="Detail<?php echo $kat['nis_murid']; ?>">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title mt-0" id="myLargeModalLabel">Detail Data Diri Murid</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        </div>
                                                                        <form method="post" class="horizontal" action="#">
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label for="field-1" class="control-label">Nama Murid</label>
                                                                                            <input type="hidden" name="nis_murid" value="<?php echo $kat['nis_murid']; ?>">
                                                                                            <input type="text" id="nama_admin" name="nama_murid" required="required" class="form-control" value="<?php echo $kat['nama_murid']; ?>" title="Nama Admin. Isikan hanya huruf." placeholder="Isikan Nama Admin !" maxlength="50" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="field-6" class="control-label">Foto Murid</label>
                                                                                            <center><img class="media-object img-circle" alt="64x64" src="../upload/<?php echo $kat['foto_murid']; ?>" style="width: 64px; height: 64px;" required="required" disabled></center>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="field-2" class="control-label">Kelas</label>
                                                                                            <input type="text" class="form-control" id="field-2" required="" placeholder="kelas" name="kelas_murid" value="<?php echo $kat['kelas_murid']; ?>" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="field-3" class="control-label">Email</label>
                                                                                            <input type="text" class="form-control" id="field-3" required="" placeholder="Address" name="email_murid" value="<?php echo $kat['email_murid']; ?>" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="field-6" class="control-label">Jenis Kelamin</label> <br>
                                                                                            <div id="jenkel_murid" class="btn-group" data-toggle="buttons">
                                                                                                <div class="form-check form-check-inline mr-1">
                                                                                                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                                                        <input class="form-check-input" id="inline-radio1" type="radio" value="L" name="jenkel_murid" <?php if ($jenkel_murid == "L") {
                                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                                        } ?> disabled>
                                                                                                        <label class="form-check-label" for="inline-radio1">Laki-Laki&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                                                                </div>
                                                                                                <div class="form-check form-check-inline mr-1">
                                                                                                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                                                        <input class="form-check-input" id="inline-radio2" type="radio" value="P" name="jenkel_murid" <?php if ($jenkel_murid == "P") {
                                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                                        } ?> disabled>
                                                                                                        <label class="form-check-label" for="inline-radio2">Perempuan</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="field-5" class="control-label">Telepon</label>
                                                                                            <input type="number" class="form-control" id="field-5" required="" placeholder="08xxx" name="no_tlp_murid" value="<?php echo $kat['no_tlp_murid']; ?>" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="field-2" class="control-label">Nama Wali</label>
                                                                                            <input type="text" class="form-control" id="field-2" required="" placeholder="namawali" name="nama_wali" value="<?php echo $kat['nama_wali']; ?>" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="field-3" class="control-label">Pekerjaan Wali</label>
                                                                                            <input type="text" class="form-control" id="field-3" required="" placeholder="Address" name="pekerjaan_wali" value="<?php echo $kat['pekerjaan_wali']; ?>" disabled>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group no-margin">
                                                                                            <label for="alamat_admin" class="control-label">Alamat</label>
                                                                                            <textarea class="form-control autogrow" required="" id="alamat_murid" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;" name="alamat_murid" disabled><?php echo $kat['alamat_murid']; ?></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- Akhir dari modal -->

                                                            </form>
                                                        <?php }  ?>
                                                    </tbody>
                                                </table>
                                                <hr />
                                                <button class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah Murid</button>
                                                <!-- <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button> -->
                                                <button class="btn btn-primary btn-bordered waves-effect w-md waves-light m-b-5" data-toggle="modal" data-target="#importModal"><i class="text-default mdi mdi-file-excel"></i> Tambah Murid via XLS</button>
                                                <a href="module/murid/export_murid.php" id="tooltip-touch" type="button" class="btn btn-info btn-bordered waves-effect w-md waves-light m-b-5"><i class="fa fa-download"></i> Download</a>
                                                <a href="../lib/print/cetak_murid.php" class="more-39291">
                                                    <button type="button" class="btn btn-warning btn-bordered waves-effect w-md waves-light m-b-5"><i class="fa fa-print m-r-5"></i> &nbsp;Cetak</button> </a> <a id="tooltip-touch" href="module/murid/aksi_clear.php" onclick="return confirm('Anda yakin ingin menghapus semua data siswa SMK Nurul Huda Losari dari sistem? Menghapus data semua siswa berarti menghapus penilaian yang berkaitan dengan siswa yang terkait.')" type="button" class="btn btn-danger btn-bordered waves-effect w-md waves-light m-b-5"><i class="text-default fa fa-trash m-r-5"></i> Hapus Semua Data</a>
                                                <hr />
                                                <h4 class="m-t-0 header-title">CATATAN :</h4>
                                                <ul>
                                                    <li>
                                                        <span class="label label-teal">Fitur <span class="label label-teal"> Tambah Murid Manual</span> berarti menginputkan data per murid.
                                                    </li>
                                                    <li>
                                                        Pada <span class="label label-success">Tambah Murid via Excel</span>, File berekstensi XLS yang di-import harus sesuai. Download Template <a href="https://drive.google.com/file/d/1T98YF2BhI1oZ2XaPcXrwHTm1mvYu0khk/view?usp=sharing"><u>di sini</u></a>.
                                                    </li>
                                                    <li>
                                                        Fitur <span class="label label-primary">Download</span> digunakan untuk mengekspor data murid ke dalam berkas berformat XLS.
                                                    </li>
                                                    <li>
                                                        <span class="label label-inverse">Cetak</span> Laporan Data Murid digunakan untuk mengekspor berkas data menjadi berformat PDF.
                                                    </li>
                                                    <li>
                                                        <span class="label label-danger">Hapus Semua Data</span> berarti juga menghapus penilaian yang terkait.
                                                    </li>
                                                </ul>
                                                <!-- <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title mt-0" id="myLargeModalLabel">Form Tambah Murid</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="#" method="post" enctype="multipart/form-data">
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">NIS Murid</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text" name="nis_murid" id="nis_murid" required="required" class="form-control col-md-7 col-xs-12" title="NIS Murid. Isikan hanya angka." placeholder="Isikan NIS Murid !" maxlength="50">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">Nama Murid</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text" name="nama_murid" id="nama_murid" required="required" class="form-control col-md-7 col-xs-12" title="Nama Murid. Isikan hanya huruf." placeholder="Isikan Nama Murid !" maxlength="50">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-email-input" class="col-sm-2 col-form-label text-right">Email Murid</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="email" id="example-email-input" name="email_murid" required="required" title="Email Murid. " placeholder="Isikan Email Murid !" maxlength="50">
                                                            </div>
                                                        </div>
                                                        <div class=" form-group row">
                                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Telepon Murid</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="tel" name="no_tlp_murid" required="required" title="No Telepon. Isikan hanya angka." placeholder="Isikan Nomor Telepon Murid!" maxlength="15" id="example-tel-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input-sm" class="col-sm-2 col-form-label text-right">Jenis Kelamin</label>
                                                            <div class="col-sm-10">
                                                                <div id="jenkel_murid" class="btn-group" data-toggle="buttons">
                                                                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                        <input type="radio" name="jenkel_murid" value="L"> &nbsp; Laki Laki &nbsp;
                                                                    </label>
                                                                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                        <input type="radio" name="jenkel_murid" value="P"> Perempuan
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input-sm" class="col-sm-2 col-form-label text-right">Kelas Murid</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" id="last-name" name="kelas_murid" required="required" class="form-control col-md-7 col-xs-12" title="Kelas Murid Ex. 10." placeholder="Isikan Kelas Murid !" maxlength="20">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input-sm" class="col-sm-2 col-form-label text-right">Alamat</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="alamat_murid" id="alamat_murid" required="required" class="form-control col-md-7 col-xs-12" title="Alamat Murid. " placeholder="Isikan Alamat murid !" maxlength="80">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">Nama Wali</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text" name="nama_wali" id="nama_wali" required="required" class="form-control col-md-7 col-xs-12" title="Nama Wali. Isikan hanya huruf." placeholder="Isikan Nama Wali !" maxlength="50">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">Pekerjaan Wali</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text" name="pekerjaan_wali" id="pekerjaan_wali" required="required" class="form-control col-md-7 col-xs-12" title="Nama Wali. Isikan hanya huruf." placeholder="Isikan Pekerjaan Wali !" maxlength="50">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input-sm" class="col-sm-2 col-form-label text-right">Foto</label>
                                                            <div class="col-sm-10">
                                                                <input type="file" class="form-control-file" id="foto" name="foto_murid" required="required">
                                                            </div>
                                                        </div>
                                                        <hr />
                                                        <div class="ln_solid"></div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-2"></div>
                                                            <div class="col-sm-10">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-success" name="tambah">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                        <!--end card-->
                                    </div>
                                    <!--end col-->
                                    <!-- sample modal content -->
                                    <div id="importModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title mt-0" id="myLargeModalLabel">Form Tambah Murid via XLS</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>

                                                <form method="POST" enctype="multipart/form-data" action="module/murid/aksi_import.php">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="nisn_murid" class="control-label">Upload XLS<span class="text-danger">*</span></label>
                                                                    <input name="filepegawai" type="file" class="form-control" required="required"><br>
                                                                    <span class="text text-justify" style="font-size:13px"> <i class="fa fa-asterisk text-dark"></i><i class="fa fa-chevron-right text-dark"></i>&nbsp;Pastikan ekstensi file adalah <span class="label label-primary">XLS</span> dengan template dari sistem.</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-dark waves-effect" data-dismiss="modal"><i class="mdi mdi-window-close"></i>&nbsp;Tutup</button>
                                                        <button type="submit" class="btn btn-info waves-effect waves-light"><i class="fa fa-paper-plane"></i>&nbsp;Simpan</button>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div>
                                <!--end row-->

                            </div>
                    </div>
                </div>
            </div>
</section>