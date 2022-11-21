<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "db_nuha";

$con=mysqli_connect ($server,$username,$password) or die ("koneksi gagal");
mysqli_select_db ($con,$database) or die ("database tidak bisa dibuka");

?>