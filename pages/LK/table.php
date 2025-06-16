<?php
include('proses/read_rekap.php');
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Laporan Keuangan Bulanan</h1>
    <hr>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Rekap Pemasukan per Bulan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableRekap" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Jumlah Transaksi</th>
                            <th>Total Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        while ($data = mysqli_fetch_assoc($q)) { 
                            $bulan = $data['bulan'];
                            $tahun = $data['tahun'];
                            $nama_bulan = date('F', strtotime($tahun . '-' . $bulan . '-01'));
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $nama_bulan . ' ' . $tahun; ?></td>
                            <td><?php echo $data['jumlah_transaksi']; ?></td>
                            <td>Rp <?php echo number_format($data['total_pendapatan'], 0, ',', '.'); ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>