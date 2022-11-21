<?php
if (isset($_POST["krt"])) {
    if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
        echo "<center>Untuk mengakses modul anda harus login<br>";
        echo "<a href=../../login.php><b>LOGIN</b></a></center>";
    } else {
        //untuk menangkap variabel nama admin yang dikirim oleh form edit wan
        $id_kriteria = $_POST['id_kriteria'];
        $nama_kriteria = $_POST['nama_kriteria'];
        $bobot_kriteria = $_POST['bobot_kriteria'];
        $tgl_ubah = date("Y-m-d H:i:s");
        $queryEditt = mysqli_query($con, "UPDATE tbl_kriteria SET nama_kriteria='$nama_kriteria',bobot_kriteria='$bobot_kriteria',tgl_ubah='$tgl_ubah' WHERE id_kriteria='$id_kriteria'");
        if ($queryEditt) {
            echo "<script>alert('Data Kriteria berhasil diubah '); window.location = 'index.php?module=kriteria';</script>";
        } else {
            echo "<script>alert ('Data Kriteria gagal diubah'); window.location = 'index.php?module=kriteria';</script>";
        }
    }
}
if (isset($_POST["tmbh"])) {
    if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
        echo "<center>Untuk mengakses modul anda harus login<br>";
        echo "<a href=../../login.php><b>LOGIN</b></a></center>";
    } else {
        //untuk menangkap variabel nama kategori yang dikirim oleh form tambah

        $nama_kriteria = $_POST['nama_kriteria'];
        $bobot_kriteria = $_POST['bobot_kriteria'];
        $jenis_kriteria = $_POST['jenis_kriteria'];
        $tgl_ubah = date("Y-m-d H:i:s");
        $querySimpan = mysqli_query($con, "INSERT INTO tbl_kriteria(nama_kriteria, bobot_kriteria, jenis_kriteria, tgl_ubah) VALUES('$nama_kriteria','$bobot_kriteria','$jenis_kriteria','$tgl_ubah')");
        if ($querySimpan) {
            echo "<script>alert ('Data Kriteria berhasil masuk'); window.location='index.php?module=kriteria';</script>";
            //jika query gagal maka akan tampil alert dan halaman akan kembali ke manajemen
        } else {
            echo "<script>alert ('Data Kriteria gagal dimasukan'); window.location = 'index.php?module=kriteria</script>";
        }
    }
}
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
                        <!-- kontent -->
                        <!-- Main content -->
                        <section class="content">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3 class="box-title">Daftar Kriteria DSS</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>ID Kriteria</th>
                                                            <th>Nama Kriteria</th>
                                                            <th>Bobot Kriteria</th>
                                                            <th>Jenis Kriteria</th>
                                                            <th>Tanggal Perubahan</th>
                                                            <th> </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        include "../lib/config.php";
                                                        include "../lib/koneksi.php";

                                                        $no = 0;
                                                        $kuerikrit = mysqli_query(
                                                            $con,
                                                            "SELECT * FROM tbl_kriteria ORDER BY id_kriteria ASC"
                                                        );
                                                        while ($kri = mysqli_fetch_array($kuerikrit)) {
                                                            $no++;
                                                            $jenis_kriteria = $kri['jenis_kriteria'];
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $kri['id_kriteria']; ?></td>
                                                                <td><?php echo $kri['nama_kriteria']; ?></td>
                                                                <td><?php echo $kri['bobot_kriteria']; ?></td>
                                                                <td><?php echo $kri['jenis_kriteria']; ?></td>
                                                                <td><?php echo $kri['tgl_ubah']; ?></td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalEdit<?php echo $kri['id_kriteria']; ?>">
                                                                            <i class="fa fa-edit btn-flat">&nbsp;&nbsp;Ubah Bobot Kriteria</i>
                                                                        </button>
                                                                </td>
                                                            </tr>
                                                            
                                                            <!-- Modal Edit-->

                                                            <div class="modal fade" id="ModalEdit<?php echo $kri['id_kriteria']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel"></h5>Form Edit
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="post">
                                                                                <div class="form-group row" hidden>
                                                                                    <label for="inputEmail3" class="col-sm-2 col-form-label">id</label>
                                                                                    <div class="col-sm-10">
                                                                                        <input type="name" class="form-control" id="inputEmail3" name="id_kriteria" value="<?php echo $kri['id_kriteria']; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                                                                                    <div class="col-sm-10">
                                                                                        <input type="nama" class="form-control" id="inputEmail3" name="nama_kriteria" placeholder="Nama Kriteria" value="<?php echo $kri['nama_kriteria']; ?>" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Bobot</label>
                                                                                    <div class="col-sm-10">
                                                                                        <input type="number" class="form-control" id="inputPassword3" name="bobot_kriteria" placeholder="Bobot Kriteria" value="<?php echo $kri['bobot_kriteria']; ?>" min="1" max="95">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Jenis Kriteria</label>
                                                                                    <div class="col-sm-10">
                                                                                        <input type="text" class="form-control" id="inputPassword3" name="jenis_kriteria" placeholder="Bobot Kriteria" value="<?php echo $kri['jenis_kriteria']; ?>" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Ditambahkan</label>
                                                                                    <div class="col-sm-10">
                                                                                        <input type="text" class="form-control" id="inputPassword3" name="tgl_ubah" placeholder="Bobot Kriteria" value="<?php echo $kri['tgl_ubah']; ?>" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- <fieldset class="form-group">
                                                                                    <div class="row">
                                                                                        <legend class="col-form-label col-sm-2 pt-0">Jenis Kriteria</legend>
                                                                                        <div class="col-sm-10">
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input" type="radio" name="jenis_kriteria" id="gridRadios1" value="Cost" checked>
                                                                                                <label class="form-check-label" for="gridRadios1">
                                                                                                    Cost
                                                                                                </label>
                                                                                            </div>
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input" type="radio" name="jenis_kriteria" id="gridRadios2" value="Benefit">
                                                                                                <label class="form-check-label" for="gridRadios2">
                                                                                                    Benefit
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </fieldset> -->
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>

                                                                            <div class="col-sm-10">
                                                                                <button type="submit" class="btn btn-primary btn-flat" name="krt">Simpan</button>
                                                                            </div>

                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--End Modal Edit-->

                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <hr />
                                                <h4 class="m-t-0 header-title">CATATAN :</h4>
                                                <ul>
                                                    <li>
                                                        <span class="label label-teal">Kriteria Penilaian <span class="label label-teal"> berdasarkan ketetapan penilaian SMK Nurul Huda Losari.</span> 
                                                    </li>
                                                    <li>
                                                     <span class="label label-success">Bobot kriteia penilaian</span> harus berjumlah 100.
                                                    </li>
                                                    <li>
                                                        <span class="label label-primary">Kriteria tidak bisa ditambahkan lagi.</span> 
                                                    </li>
                                                    <li>
                                                        <span class="label label-primary">Jenis Kriteria Benefit </span> berarti semakin tinggi nilainya maka semakin bagus.
                                                    </li> 
                                                    <li>
                                                        <span class="label label-primary">Jenis Kriteria Cost </span> berarti semakin kecil nilainya maka semakin bagus.
                                                    </li>
                                                </ul>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>