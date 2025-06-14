<?php 
if (!isset($_POST['btn-submit'])) {
    header('location:../../index.php');
}


$kode = $_POST['kode'];
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];


session_start();

if($kode == ''){
    $_SESSION['msg']['err_kode'] = "kode tidak boleh kosong";
}
if($nama == ''){
    $_SESSION['msg']['err_nama'] = "nama tidak boleh kosong";
}
if($no_hp == ''){
    $_SESSION['msg']['err_no_hp'] = "nomor tidak boleh kosong";
}
if($alamat == ''){
    $_SESSION['msg']['err_alamat'] = "alamat tidak boleh kosong";
}

if(isset($_SESSION['msg']['err_kode']) || isset($_SESSION['msg']['err_nama'])|| isset($_SESSION['msg']['err_no_hp'])|| isset($_SESSION['msg']['err_alamat'])){
    header('location:../../?page=MP/form_input');
    exit();
}

include('../../../assets/koneksi.php');

$query = "SELECT * FROM pelanggan WHERE kode_pelanggan='$kode' OR nama_pelanggan='$nama'";
$q = mysqli_query($koneksi, $query);
if(mysqli_num_rows($q)!=0){
    $_SESSION['msg']['error'] = "Data pelanggan sudah ada, periksa kode atau nama yang sama";
    header('location:../../?page=MP/form_input');
    exit();
}

$query = "INSERT INTO pelanggan VALUES('$kode','$nama','$no_hp','$alamat')";
mysqli_query($koneksi, $query);
$_SESSION['msg']['success'] = "Data pelanggan baru berhasil di input";
header('location:../../?page=MP/form_input');