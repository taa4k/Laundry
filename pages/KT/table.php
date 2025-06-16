<?php
include('proses/read.php');
$no = 1;
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">TABLE TRANSAKSI</h1>
    <hr>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">DATA TRANSAKSI</h6>
        </div>
        <div class="d-flex">
            <a href="?page=KT/form_input"><i class="btn btn-primary btn-user ms-3 mt-3">Transaksi Masuk</i></a>
            <a href="?page=KT/form_keluar"><i class="btn btn-warning btn-user ms-3 mt-3">Transaksi Keluar</i></a>
        </div>
        <div class="card-body">
            <?php 
            if(isset($_SESSION['msg']['success'])){
                echo '
                    <div class="alert alert-success" role="alert">
                        '.$_SESSION['msg']['success'].'
                    </div>
                ';
            }
            ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Kode Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Atribut</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Keluar</th>
                            <th>Total Harga</th>
                            <th>Status Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($data = mysqli_fetch_array($q)) { ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['kode_pelanggan']; ?></td>
                            <td><?php echo $data['nama_pelanggan']; ?></td>
                            <!-- Atribut (jumlah laundry yang dipinjam) -->
                            <td><?php echo $data['atribut']; ?></td>
                            <td><?php echo $data['tgl_masuk']; ?></td>
                            <!-- Perbaikan kolom Tanggal Keluar -->
                            <td>
                                <?php 
                                echo (!is_null($data['tgl_keluar']) && $data['tgl_keluar'] !== '0000-00-00') 
                                    ? $data['tgl_keluar'] 
                                    : '-';
                                ?>
                            </td>
                            <td>
                                Rp <?php echo number_format($data['total_harga'], 0, ',', '.'); ?>
                            </td>
                            <!-- Kolom Status Pembayaran -->
                            <td>
                                <?php 
    $status = (!is_null($data['tgl_keluar']) && $data['tgl_keluar'] !== '0000-00-00')
        ? 'LUNAS'
        : 'BELUM DIBAYAR';

    echo ($status === 'LUNAS') 
        ? '<span class="badge bg-success text-light px-3 py-2" style="font-weight: bold;">'.$status.'</span>' 
        : '<span class="badge bg-danger text-light px-3 py-2" style="font-weight: bold;">'.$status.'</span>';
    ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php 
unset($_SESSION['msg']);
?>