<?php
include('../assets/koneksi.php');

// Total pemasukan bulan ini (lunas)
$pemasukan_bulan_ini = mysqli_fetch_assoc(mysqli_query($koneksi, "
    SELECT SUM(total_harga) AS total 
    FROM transaksi 
    WHERE tgl_keluar IS NOT NULL 
    AND MONTH(tgl_keluar) = MONTH(CURDATE()) 
    AND YEAR(tgl_keluar) = YEAR(CURDATE())
"))['total'] ?? 0;

// Transaksi hari ini
$transaksi_hari_ini = mysqli_fetch_assoc(mysqli_query($koneksi, "
    SELECT COUNT(*) AS total 
    FROM transaksi 
    WHERE tgl_masuk = CURDATE()
"))['total'] ?? 0;

// Transaksi belum lunas
$belum_lunas = mysqli_fetch_assoc(mysqli_query($koneksi, "
    SELECT COUNT(*) AS total 
    FROM transaksi 
    WHERE tgl_keluar IS NULL
"))['total'] ?? 0;

// Total pelanggan
$total_pelanggan = mysqli_fetch_assoc(mysqli_query($koneksi, "
    SELECT COUNT(*) AS total 
    FROM pelanggan
"))['total'] ?? 0;

// 5 transaksi terbaru
$recent = mysqli_query($koneksi, "
    SELECT transaksi.tgl_masuk, transaksi.kode_pelanggan, pelanggan.nama_pelanggan, transaksi.total_harga 
    FROM transaksi
    JOIN pelanggan ON transaksi.kode_pelanggan = pelanggan.kode_pelanggan
    ORDER BY transaksi.id DESC
    LIMIT 5
");
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Dashboard Laundry</h1>
    <hr>

    <!-- Summary Cards -->
    <div class="row">
        <!-- Pemasukan Bulan Ini -->
        <div class="col-md-3">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    Pemasukan Bulan Ini
                    <div class="h5 mt-2">Rp <?php echo number_format($pemasukan_bulan_ini, 0, ',', '.'); ?></div>
                </div>
            </div>
        </div>

        <!-- Transaksi Hari Ini -->
        <div class="col-md-3">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    Transaksi Hari Ini
                    <div class="h5 mt-2"><?php echo $transaksi_hari_ini; ?> transaksi</div>
                </div>
            </div>
        </div>

        <!-- Belum Lunas -->
        <div class="col-md-3">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    Belum Dibayar
                    <div class="h5 mt-2"><?php echo $belum_lunas; ?> transaksi</div>
                </div>
            </div>
        </div>

        <!-- Total Pelanggan -->
        <div class="col-md-3">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    Pelanggan Terdaftar
                    <div class="h5 mt-2"><?php echo $total_pelanggan; ?> orang</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaksi Terbaru -->
    <div class="card mt-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-dark">5 Transaksi Terbaru</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>Tanggal Masuk</th>
                        <th>Kode Pelanggan</th>
                        <th>Nama Pelanggan</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($data = mysqli_fetch_assoc($recent)) { ?>
                    <tr>
                        <td><?php echo $data['tgl_masuk']; ?></td>
                        <td><?php echo $data['kode_pelanggan']; ?></td>
                        <td><?php echo $data['nama_pelanggan']; ?></td>
                        <td>Rp <?php echo number_format($data['total_harga'], 0, ',', '.'); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>