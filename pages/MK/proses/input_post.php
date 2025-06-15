<?php 
if (!isset($_POST['btn-submit'])) {
    header('location:../../index.php');
}


$kode = $_POST['kode'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$tanggal = $_POST['tanggal'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];


session_start();

if($kode == ''){
    $_SESSION['msg']['err_kode'] = "kode tidak boleh kosong";
}
if($nama == ''){
    $_SESSION['msg']['err_nama'] = "nama tidak boleh kosong";
}
if($jk == ''){
    $_SESSION['msg']['err_jk'] = "jenis kelamin tidak boleh kosong";
}
if($tanggal == ''){
    $_SESSION['msg']['err_tanggal'] = "tanggal tidak boleh kosong";
}
if($alamat == ''){
    $_SESSION['msg']['err_alamat'] = "alamat tidak boleh kosong";
}
if($no_hp == ''){
    $_SESSION['msg']['err_no_hp'] = "nomor handphone tidak boleh kosong";
}

if(isset($_SESSION['msg']['err_kode']) || isset($_SESSION['msg']['err_nama'])|| isset($_SESSION['msg']['err_jk'])|| isset($_SESSION['msg']['err_tanggal'])
|| isset($_SESSION['msg']['err_alamat'])|| isset($_SESSION['msg']['err_no_hp'])){
    header('location:../../?page=MK/form_input');
    exit();
}

include('../../../assets/koneksi.php');

$query = "SELECT * FROM karyawan WHERE kode_karyawan='$kode' OR nama_karyawan='$nama'";
$q = mysqli_query($koneksi, $query);
if(mysqli_num_rows($q)!=0){
    $_SESSION['msg']['error'] = "Data pelanggan sudah ada, periksa kode atau nama yang sama";
    header('location:../../?page=MK/form_input');
    exit();
}

$query = "INSERT INTO karyawan VALUES('$kode','$nama','$jk','$tanggal','$alamat','$no_hp')";
mysqli_query($koneksi, $query);
$_SESSION['msg']['success'] = "Data pelanggan baru berhasil di input";
header('location:../../?page=MK/form_input');