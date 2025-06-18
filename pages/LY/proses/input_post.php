<?php 
if (!isset($_POST['btn-submit'])) {
    header('location:../../index.php');
}

$atribut = $_POST['atribut'];
$deskripsi = $_POST['deskripsi'];


session_start();
if($atribut == ''){
    $_SESSION['msg']['err_atribut'] = "atribut tidak boleh kosong";
}
if($deskripsi == ''){
    $_SESSION['msg']['err_deskripsi'] = "deskripsi tidak boleh kosong";
}

if(isset($_SESSION['msg']['err_kode']) || isset($_SESSION['msg']['err_atribut'])|| isset($_SESSION['msg']['err_deskripsi'])){
    header('location:../../?page=LY/form_input');
    exit();
}

include('../../../assets/koneksi.php');

$query = "SELECT * FROM laundry WHERE atribut='$atribut'";
$q = mysqli_query($koneksi, $query);
if(mysqli_num_rows($q)!=0){
    $_SESSION['msg']['error'] = "Data laundry sudah ada, periksa atribut yang sama";
    header('location:../../?page=LY/form_input');
    exit();
}

$query = "INSERT INTO laundry (atribut, deskripsi) VALUES('$atribut','$deskripsi')";
mysqli_query($koneksi, $query);
$_SESSION['msg']['success'] = "Data pelanggan baru berhasil di input";
header('location:../../?page=LY/form_input');