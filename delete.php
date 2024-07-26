<?php 
// koneksi database
include 'koneksi/config.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($dbconnect,"delete from anggota where id_anggota='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
 
?>