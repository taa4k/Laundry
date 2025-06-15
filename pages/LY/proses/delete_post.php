<?php 

$kode = $_REQUEST['kode_pelanggan'];

include('../../../assets/koneksi.php');

$query = "DELETE FROM pelanggan WHERE kode_pelanggan='$kode'";
mysqli_query($koneksi, $query);
session_start();
$_SESSION['msg']['success'] = "Data pelanggan ".$kode." berhasil dihapus";
header('location:../../?page=MP/table');