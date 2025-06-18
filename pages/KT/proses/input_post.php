<?php
session_start();
include('../../../assets/koneksi.php');

if (!isset($_POST['btn-submit'])) {
    header('location: ../../index.php');
    exit();
}

// Ambil data dari form
$kode_pelanggan     = $_POST['pelanggan_kode'];
$nama_pelanggan     = $_POST['pelanggan_nama']; // hanya ditampilkan, tidak disimpan
$laundry_kode       = $_POST['laundry_kode'];
$tgl_masuk          = $_POST['tgl_masuk'];
$total_harga        = $_POST['total_harga'];

// Simpan ke session untuk redisplay jika error
$_SESSION['value'] = [
    'pelanggan_kode' => $kode_pelanggan,
    'pelanggan_nama' => $nama_pelanggan,
    'laundry_kode'   => $laundry_kode,
    'tgl_masuk'      => $tgl_masuk,
    'total_harga'    => $total_harga
];

// Validasi input
if ($kode_pelanggan == '') {
    $_SESSION['msg']['pelanggan_kode'] = "Kode pelanggan tidak boleh kosong!";
}
if ($laundry_kode == '') {
    $_SESSION['msg']['laundry_kode'] = "Atribut laundry harus dipilih!";
}
if ($tgl_masuk == '') {
    $_SESSION['msg']['tgl_masuk'] = "Tanggal masuk tidak boleh kosong!";
}
if ($total_harga == '') {
    $_SESSION['msg']['total_harga'] = "Total harga tidak boleh kosong!";
}

// Jika ada error, kembali ke form
if (!empty($_SESSION['msg'])) {
    header('location: ../../?page=KT/form_input');
    exit();
}

try {
    // Mulai transaksi database
    mysqli_autocommit($koneksi, false);

    // Simpan ke tabel transaksi
    $query_transaksi = "INSERT INTO transaksi 
        (kode_pelanggan, kode_laundry, tgl_masuk, tgl_keluar, total_harga, status_pembayaran)
        VALUES ('$kode_pelanggan', '$laundry_kode', '$tgl_masuk', NULL, '$total_harga', NULL)";
    
    $result_transaksi = mysqli_query($koneksi, $query_transaksi);
    if (!$result_transaksi) {
        throw new Exception("Gagal menyimpan data transaksi: " . mysqli_error($koneksi));
    }

    $id_transaksi = mysqli_insert_id($koneksi);

    // Simpan ke tabel detail_transaksi
    $query_detail = "INSERT INTO detail_transaksi 
        (id_transaksi, kode_pelanggan, laundry_kode)
        VALUES ('$id_transaksi', '$kode_pelanggan', '$laundry_kode')";
    
    $result_detail = mysqli_query($koneksi, $query_detail);
    if (!$result_detail) {
        throw new Exception("Gagal menyimpan detail transaksi: " . mysqli_error($koneksi));
    }

    // Commit transaksi
    mysqli_commit($koneksi);

    $_SESSION['msg']['success'] = "Transaksi berhasil disimpan!";
    unset($_SESSION['value']);
    header('location: ../../?page=KT/form_input');
    exit();
} catch (Exception $e) {
    mysqli_rollback($koneksi);
    $_SESSION['msg']['error'] = $e->getMessage();
    header('location: ../../?page=KT/form_input');
    exit();
}
?>