<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">TRANSAKSI KELUAR</h1>
</div>
<form action="KT/proses/keluar_post.php" method="POST">
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
                    <br>
                    <div class="form-group">
                        <label for="pelanggan_nama">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nama_pelanggan" name="pelanggan_nama"
                            placeholder="Masukkan Nama Pelanggan.." readonly
                            value="<?php echo isset($data['nama_pelanggan']) ? $data['nama_pelanggan'] : '';
                                    echo (isset($_SESSION['value']['pelanggan_nama'])) ? $_SESSION['value']['pelanggan_nama'] : null; ?>" readonly />
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="tgl_keluar">Tanggal Keluar Dari Laundry</label>
                        <input type="date"
                            class="form-control <?php echo (isset($_SESSION['msg']['tgl_keluar'])) ? 'border-danger' : null; ?>"
                            id="tgl_keluar" name="tgl_keluar" placeholder="dd-mm-yyyy"
                            value="<?php echo (isset($_SESSION['value']['tgl_keluar'])) ? $_SESSION['value']['tgl_keluar'] : null; ?>">
                        <?php if (isset($_SESSION['msg']['tgl_keluar'])) {
                        echo '<span class="text-danger">' . $_SESSION['msg']['tgl_keluar'] . '</span>';
                     } ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="status_pembayaran">Status Pembayaran</label>
                        <input type="text"
                            class="form-control <?php echo (isset($_SESSION['msg']['status_pembayaran'])) ? 'border-danger' : null; ?>"
                            id="status_pembayaran" name="status_pembayaran" placeholder="Masukkan Status Pembayaran.."
                            value="<?php echo (isset($_SESSION['value']['status_pembayaran'])) ? $_SESSION['value']['status_pembayaran'] : null; ?>">
                        <?php if (isset($_SESSION['msg']['status_pembayaran'])) {
                        echo '<span class="text-danger">' . $_SESSION['msg']['status_pembayaran'] . '</span>';
                     } ?>
                    </div>
                    <br>
                    <button name="btn-submit" type="submit" class="btn btn-primary">Submit</button>
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