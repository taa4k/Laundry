<?php
// Memulai sesi dan memastikan koneksi database
include('../../../assets/koneksi.php');

// Mengecek apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
// Mengecek apakah parameter 'q' ada
if (isset($_GET['q'])) {
    $kode = $_GET['q'];

    // Query untuk mencari nama berdasarkan NIK
    $query = "SELECT nama_pelanggan FROM pelanggan WHERE kode_pelanggan = '$kode' LIMIT 1";
    $q = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($q) > 0) {
        // Menampilkan nama jika NIK ditemukan
        $data = mysqli_fetch_array($q);
        echo $data['nama_pelanggan'];
    } else {
        // Menampilkan pesan jika NIK tidak ditemukan
        echo "Tidak ada data anggota berdasarkan KODE ini!";
    }
}

if (isset($_GET['b'])) {
    $kode = $_GET['b'];

    // Ganti dari tabel buku → laundry
    $query = "SELECT atribut FROM laundry WHERE kode_laundry = '$kode' LIMIT 1";
    $q = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($q) > 0) {
        $data = mysqli_fetch_array($q);
        echo $data['atribut'];
    } else {
        echo "Tidak ada data laundry berdasarkan kode ini!";
    }
}


mysqli_close($koneksi);