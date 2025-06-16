<?php
include('../assets/koneksi.php');

// Ambil semua data transaksi utama
$query = "SELECT 
    transaksi.id,
    transaksi.kode_pelanggan,
    transaksi.kode_laundry,
    transaksi.tgl_masuk,
    transaksi.tgl_keluar,
    transaksi.total_harga,
    pelanggan.nama_pelanggan,
    laundry.atribut
FROM transaksi
LEFT JOIN pelanggan ON transaksi.kode_pelanggan = pelanggan.kode_pelanggan
LEFT JOIN laundry ON transaksi.kode_laundry = laundry.kode_laundry
ORDER BY transaksi.id DESC";



$q = mysqli_query($koneksi, $query);
if (!$q) {
    die("Query error: " . mysqli_error($koneksi));
}

// Untuk detail transaksi
if (isset($_REQUEST['id_tr'])) {
    $id = $_REQUEST['id_tr'];

    $query = "SELECT * FROM detail_transaksi
              LEFT JOIN laundry ON detail_transaksi.laundry_kode = laundry.kode_laundry
              LEFT JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id
              LEFT JOIN pelanggan ON transaksi.kode_pelanggan = pelanggan.kode_pelanggan
              WHERE detail_transaksi.id_transaksi = '$id'";

    $q = mysqli_query($koneksi, $query);
    $queryanggota = mysqli_query($koneksi, $query);
    $dataanggota = mysqli_fetch_array($queryanggota);
}

// Untuk ambil data ke form update jika ada ID
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $query = "SELECT * FROM detail_transaksi
              LEFT JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id
              LEFT JOIN laundry ON detail_transaksi.laundry_kode = laundry.kode_laundry
              LEFT JOIN pelanggan ON detail_transaksi.kode_pelanggan = pelanggan.kode_pelanggan
              WHERE detail_transaksi.id_transaksi = '$id'";

    $q = mysqli_query($koneksi, $query);
    $laundry = [];
    if (mysqli_num_rows($q) > 0) {
        while ($row = mysqli_fetch_array($q)) {
            $laundry[] = $row;
        }
    }

    $q = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($q);
}