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
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];

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
    header('location:../../?page=MP/form_update');
    exit();
}

$query = "SELECT * FROM pelanggan WHERE nama_pelanggan='$nama' AND kode_pelanggan != '$kode'";
$q = mysqli_query($koneksi, $query);
if(mysqli_num_rows($q) != 0){
    $_SESSION['msg']['error'] = "Data kategori sudah ada, periksa kode atau nama yang sama";
    header('location:../../?page=MP/form_update&kode_pelanggan='.$kode);
    exit();
}

$query = "UPDATE pelanggan SET nama_pelanggan='$nama', no_hp='$no_hp', alamat='$alamat' WHERE kode_pelanggan='$kode'";
if (mysqli_query($koneksi, $query)) {
    $_SESSION['msg']['success'] = "Data penerbit berhasil diupdate";    
} else {
    $_SESSION['msg']['error'] = "Gagal mengupdate data: " . mysqli_error($koneksi);
}
header('location:../../?page=MP/table');
exit();
?>