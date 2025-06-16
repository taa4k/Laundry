<?php
include('../assets/koneksi.php');

$query = "SELECT transaksi.id, transaksi.kode_anggota, transaksi.tgl_masuk, transaksi.tgl_keluar, detail_transaksi.id_transaksi, pelanggan.kode_pelanggan, pelanggan.nama_pelanggan, COUNT(detail_transaksi.id_transaksi) AS pemasukkan_laundry
        FROM transaksi
        LEFT JOIN pelanggan ON transaksi.kode_pelanggan = pelanggan.kode_pelanggan
        LEFT JOIN detail_transaksi ON transaksi.id = detail_transaksi.id_transaksi
        GROUP BY transaksi.id ORDER BY transaksi.id DESC";
$q = mysqli_query($koneksi, $query);


// detail   
if (isset($_REQUEST['id_tr'])) {
    $id = $_REQUEST['id_tr'];

    // Ambil detail transaksi beserta data member dan buku
    $query = "SELECT * FROM detail_transaksi
            LEFT JOIN laundry ON detail_transaksi.kode_laundry = laundry.kode_laundry
            LEFT JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id
            LEFT JOIN pelanggan ON transaksi.kode_pelanggan = pelanggan.kode_pelanggan
            WHERE detail_transaksi.id_transaksi = '$id'
   ";
    $q = mysqli_query($koneksi, $query);
    $queryanggota = mysqli_query($koneksi, $query);
    $dataanggota = mysqli_fetch_array($queryanggota);
}

// menampilkan data lama di form peminjaman
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $query = "SELECT * FROM detail_transaksi
            LEFT JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id
            LEFT JOIN laundry ON detail_transaksi.kode_laundry = laundry.kode_laundry
            LEFT JOIN pelanggan ON detail_transaksi.kode_pelanggan = pelanggan.kode_pelanggan
            WHERE detail_transaksi.id_transaksi = '$id'
    ";

    $q = mysqli_query($koneksi, $query);
    $buku = [];
    if (mysqli_num_rows($q) > 0) {
        while ($row = mysqli_fetch_array($q)) {
            $buku[] = $row; // Menyimpan setiap baris data ke dalam array
        }
    }

    $q = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($q);
}