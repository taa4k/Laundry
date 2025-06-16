<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">TRANSAKSI KELUAR</h1>
</div>
<form action="pages/pinjam/proses/kembali_post.php" method="POST">
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <!-- Form pertama -->
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-5">
                    <?php 
                    if(isset($_SESSION['msg']['error'])){
                        echo '
                            <div class="alert alert-danger" role="alert">
                                '.$_SESSION['msg']['error'].'
                            </div>
                        ';
                    }
                    if(isset($_SESSION['msg']['success'])){
                        echo '
                            <div class="alert alert-success" role="alert">
                                '.$_SESSION['msg']['success'].'
                            </div>
                        ';
                    }
                ?>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Masukkan Data Selesai Laundry</h1>
                    </div>
                    <!-- Form Data Peminjam -->
                    <div class="form-group">
                        <label for="pelanggan_kode">Kode Pelanggan</label>
                        <div class="d-flex">
                            <input
                                value="<?php echo (isset($_SESSION['value']['pelanggan_kode'])) ? $_SESSION['value']['pelanggan_kode'] : null; ?>"
                                type="text"
                                class="form-control <?php echo (isset($_SESSION['msg']['pelanggan_kode'])) ? 'border-danger' : null; ?>"
                                id="pelanggan_kode" name="pelanggan_kode" placeholder="Masukkan Kode Pelanggan.."
                                onkeyup="showpelanggan(this.value)">
                        </div>
                        <?php if (isset($_SESSION['msg']['pelanggan_kode'])) {
                            echo '<span class="text-danger">' . $_SESSION['msg']['pelanggan_kode'] . '</span>';
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="nama_anggota">NAMA</label>
                        <input type="text" class="form-control" id="nama_anggota" name="nama_anggota"
                            placeholder="Masukkan nama.." readonly
                            value="<?php echo isset($data['nama']) ? $data['nama'] : '';
                                 echo (isset($_SESSION['value']['nama_anggota'])) ? $_SESSION['value']['nama_anggota'] : null; ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label for="tgl_kembali">Tanggal Pengembalian</label>
                        <input type="date"
                            class="form-control <?php echo (isset($_SESSION['msg']['tgl_kembali'])) ? 'border-danger' : null; ?>"
                            id="tgl_kembali" name="tgl_kembali" placeholder="dd-mm-yyyy"
                            value="<?php echo (isset($_SESSION['value']['tgl_kembali'])) ? $_SESSION['value']['tgl_kembali'] : null; ?>">
                        <?php if (isset($_SESSION['msg']['tgl_kembali'])) {
                        echo '<span class="text-danger">' . $_SESSION['msg']['tgl_kembali'] . '</span>';
                     } ?>
                    </div>
                    <button name="btn-submit" type="submit" class="btn btn-dark">Submit</button>
                </div>
            </div>
        </div>
</form>
</div>
<?php
include('proses/live.php');
unset($_SESSION['value']);
unset($_SESSION['msg']);
?>