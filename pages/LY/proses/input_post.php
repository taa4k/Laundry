<?php 
if (!isset($_POST['btn-submit'])) {
    header('location:../../index.php');
}


$kode = $_POST['kode'];
$atribut = $_POST['atribut'];
$deskripsi = $_POST['deskripsi'];


session_start();

if($kode == ''){
    $_SESSION['msg']['err_kode'] = "kode tidak boleh kosong";
}
if($atribut == ''){
    $_SESSION['msg']['err_atribut'] = "atribut tidak boleh kosong";
}
if($deskripsi == ''){
    $_SESSION['msg']['err_deskripsi'] = "deskripsi tidak boleh kosong";
}

if(isset($_SESSION['msg']['err_kode']) || isset($_SESSION['msg']['err_atribut'])|| isset($_SESSION['msg']['err_deskripsi'])){
    header('location:../../?page=MP/form_input');
    exit();
}

include('../../../assets/koneksi.php');

$query = "SELECT * FROM laundry WHERE kode_laundry='$kode' OR atribut='$atribut'";
$q = mysqli_query($koneksi, $query);
if(mysqli_num_rows($q)!=0){
    $_SESSION['msg']['error'] = "Data laundry sudah ada, periksa kode atau atribut yang sama";
    header('location:../../?page=MP/form_input');
    exit();
}

$query = "INSERT INTO laundry VALUES('$kode','$atribut','$deskripsi')";
mysqli_query($koneksi, $query);
$_SESSION['msg']['success'] = "Data pelanggan baru berhasil di input";
header('location:../../?page=MP/form_input');