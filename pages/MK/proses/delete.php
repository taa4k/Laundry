<?php 

$kode = $_REQUEST['kode_karyawan'];

include('../../../assets/koneksi.php');

$query = "DELETE FROM pelanggan WHERE kode_karyawan='$kode'";
mysqli_query($koneksi, $query);
session_start();
$_SESSION['msg']['success'] = "Data karyawan ".$kode." berhasil dihapus";
header('location:../../?page=MK/table');