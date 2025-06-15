<?php 

$kode = $_REQUEST['kode_laundry'];

include('../../../assets/koneksi.php');

$query = "DELETE FROM laundry WHERE kode_laundry='$kode'";
mysqli_query($koneksi, $query);
session_start();
$_SESSION['msg']['success'] = "Data laundry ".$kode." berhasil dihapus";
header('location:../../?page=LY/table');