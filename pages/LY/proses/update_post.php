<?php 
session_start();
include('../../../assets/koneksi.php');

// Fungsi untuk menyimpan data penerbit
if (!isset($_POST['btn-submit'])) {
    header('location:../../index.php');
    exit();
}

$kode = $_POST['kode'];
$atribut = $_POST['atribut'];
$deskripsi = $_POST['deskripsi'];

if($atribut == ''){
    $_SESSION['msg']['err_atribut'] = "atribut tidak boleh kosong";
}
if($deskripsi == ''){
    $_SESSION['msg']['err_deskripsi'] = "deskripsi tidak boleh kosong";
}

if(isset($_SESSION['msg']['err_kode']) || isset($_SESSION['msg']['err_atribut'])|| isset($_SESSION['msg']['err_deskripsi'])){
    header('location:../../?page=LY/form_update');
    exit();
}

$query = "UPDATE laundry SET atribut='$atribut', deskripsi='$deskripsi' WHERE kode_laundry='$kode'";
if (mysqli_query($koneksi, $query)) {
    $_SESSION['msg']['success'] = "Data penerbit berhasil diupdate";    
} else {
    $_SESSION['msg']['error'] = "Gagal mengupdate data: " . mysqli_error($koneksi);
}
header('location:../../?page=LY/table');
exit();
?>