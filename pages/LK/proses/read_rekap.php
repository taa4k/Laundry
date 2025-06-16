<?php
include('../assets/koneksi.php');

// Query rekap bulanan: berdasarkan tgl_keluar
$query = "SELECT 
            MONTH(tgl_keluar) AS bulan,
            YEAR(tgl_keluar) AS tahun,
            COUNT(*) AS jumlah_transaksi,
            SUM(total_harga) AS total_pendapatan
          FROM transaksi
          WHERE tgl_keluar IS NOT NULL
          GROUP BY YEAR(tgl_keluar), MONTH(tgl_keluar)
          ORDER BY tahun DESC, bulan DESC";

$q = mysqli_query($koneksi, $query);

// Error handling
if (!$q) {
    die("Query error: " . mysqli_error($koneksi));
}
?>