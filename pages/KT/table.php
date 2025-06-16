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
            <h6 class="m-0 font-weight-bold text-dark"> DATA TRANSAKSI</h6>
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
                            <th>atribut</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal keluar</th>
                            <th>Status Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($data = mysqli_fetch_array($q)) { ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['kode_pelanggan']; ?></td>
                            <td><?php echo $data['nama'] ?></td>
                            <td><?php echo ($data['tgl_kembali'] != null) ? '0' : $data['peminjaman_buku'] ?>/3</td>
                            <td><?php echo $data['tgl_pinjam'] ?></td>
                            <td><?php echo ($data['tgl_kembali'] != null) ? $data['tgl_kembali'] : '<b>Belum Kembali !</b>' ?>
                            </td>
                            <td>
                                <a href="?page=pinjam/detail_pinjam&id_tr=<?php echo $data['id_transaksi']; ?>"
                                    class="btn btn-sm btn-warning">
                                    Detail
                                    <i class="ri-book-open-line"></i>
                                </a>
                                <a href="?page=pinjam/pinjam_update&id=<?php echo $data['id']; ?>"
                                    class="btn btn-sm btn-info <?php echo ($data['tgl_kembali'] != null || $data['peminjaman_buku'] == '3') ? 'disabled' : null ?>">
                                    Add books
                                    <i class="ri-add-line"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                                }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php 
unset($_SESSION['msg']);
?>