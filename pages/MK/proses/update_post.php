<?php 
session_start();
include('../../../assets/koneksi.php');

// Fungsi untuk menyimpan data penerbit
if (!isset($_POST['btn-submit'])) {
    header('location:../../index.php');
    exit();
}

$kode = $_POST['kode'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$tanggal = $_POST['tanggal'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

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

if(isset($_SESSION['msg']['err_kode']) || isset($_SESSION['msg']['err_nama'])|| isset($_SESSION['msg']['err_jk'])|| isset($_SESSION['msg']['err_tanggal'])|| isset($_SESSION['msg']['err_alamat'])|| isset($_SESSION['msg']['err_no_hp'])){
    header('location:../../?page=MK/form_update');
    exit();
}

$query = "SELECT * FROM karyawan WHERE nama_karyawan='$nama' AND kode_karyawan != '$kode'";
$q = mysqli_query($koneksi, $query);
if(mysqli_num_rows($q) != 0){
    $_SESSION['msg']['error'] = "Data kategori sudah ada, periksa kode atau nama yang sama";
    header('location:../../?page=MK/form_update&kode_karyawan='.$kode);
    exit();
}

$query = "UPDATE karyawan SET nama_karyawan='$nama', jk='$jk', tanggal='$tanggal', alamat='$alamat', no_hp='$no_hp'";
if (mysqli_query($koneksi, $query)) {
    $_SESSION['msg']['success'] = "Data penerbit berhasil diupdate";    
} else {
    $_SESSION['msg']['error'] = "Gagal mengupdate data: " . mysqli_error($koneksi);
}
header('location:../../?page=MK/table');
exit();
?>