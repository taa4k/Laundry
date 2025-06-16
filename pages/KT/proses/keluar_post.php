<?php
session_start();
include('../../../assets/koneksi.php');

if (!isset($_POST['btn-submit'])) {
    header('location: ../../index.php');
    exit();
}

// Ambil data dari form
$kode_pelanggan = $_POST['pelanggan_kode'];
$nama_pelanggan = $_POST['pelanggan_nama'];
$tgl_keluar = $_POST['tgl_keluar'];


// Simpan ke session untuk redisplay
$_SESSION['value'] = [
    'pelanggan_kode' => $kode_pelanggan,
    'pelanggan_nama' => $nama_pelanggan,
    'tgl_keluar' => $tgl_keluar,
];

// Validasi
if ($kode_pelanggan == '') {
    $_SESSION['msg']['pelanggan_kode'] = "Kode pelanggan tidak boleh kosong!";
}
if ($tgl_keluar == '') {
    $_SESSION['msg']['tgl_keluar'] = "Tanggal keluar tidak boleh kosong!";
}
if (isset($_SESSION['msg'])) {
    header('location: ../../?page=KT/form_keluar');
    exit();
}

// Mulai transaksi database
mysqli_autocommit($koneksi, false); 
     // 1. Cek apakah ada transaksi peminjaman yang belum dikembalikan
        $query = "SELECT tgl_masuk, tgl_keluar FROM transaksi WHERE kode_pelanggan ='$kode_pelanggan'AND tgl_keluar IS NULL";
        $q = mysqli_query($koneksi, $query); 
    
        $datamasuk =  mysqli_fetch_assoc($q);
        if (!$datamasuk) {
            $_SESSION['msg']['error'] = "Tidak ada pemasukan laundry untuk member ini!";
            header('location: ../../?page=KT/form_keluar');
            exit();
        }
        
        // 2. Validasi tanggal pengembalian tidak boleh lebih kecil dari tanggal peminjaman
        $tgl_pinjam = $datapinjam['tgl_keluar']; // Ambil tanggal peminjaman
            if (strtotime($tgl_keluar) < strtotime($tgl_masuk)) {
            $_SESSION['msg']['error'] = "Tanggal keluar tidak boleh lebih kecil dari tanggal peminjaman!";
            header('location: .../../?page=KT/form_keluar');
            exit();
   }

    // 3. Masukkan data ke tabel transaksi
    $queryupdatetransaksi = "UPDATE transaksi  SET tgl_keluar='$tgl_keluar' WHERE kode_pelanggan='$kode_pelanggan' "; 
    $qupdatetransaksi = mysqli_query($koneksi, $queryupdatetransaksi);
    if (!$qupdatetransaksi) {
        throw new Exception("Gagal memasukkan tanggal keluar : " . mysqli_error($koneksi));
    }
    $queryGettransaksi = "SELECT id FROM transaksi WHERE kode_pelanggan='$kode_pelanggan' AND tgl_keluar='$tgl_keluar'";
   $resulttransaksi = mysqli_query($koneksi, $queryGettransaksi);
   if (!$resulttransaksi) {
      throw new Exception("Gagal mendapatkan id_transaksi: " . mysqli_error($koneksi));
   }

    // Ambil id transaksi yang baru saja dimasukkan
    $data_transaksi = mysqli_fetch_array($resulttransaksi);
    $id_transaksi = $data_transaksi['id'];
    // Commit transaksi
    mysqli_commit($koneksi);

    // Set pesan sukses
    $_SESSION['msg']['success'] = "laundry <b>" . $kode_pelanggan . "</b> sudah di bayar!";
    unset($_SESSION['value']);
    header('location: ../../?page=KT/table');
    exit(); 