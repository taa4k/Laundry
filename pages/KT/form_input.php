<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaksi Masuk</h1>
</div>
<form action="KT/proses/input_post.php" method="POST">
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <!-- Form pertama -->
            <div class="card o-hidden border-0 shadow-lg my-5">
                <a href="?page=KT/table"><i class="btn btn-dark btn-user ms-3 mt-3">Kembali</i></a>
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
                        <h1 class="h4 text-gray-900 mb-4">Masukkan Data laundry Masuk</h1>
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
                    <!-- tidak digunakan karena berbahaya ada spike -->

                    <br>
                    <div class="form-group">
                        <select
                            class="form-control <?php echo (isset($_SESSION['msg']['laundry_kode'])) ? 'border-danger' : null; ?>"
                            id="kode_laundry" name="laundry_kode">
                            <option value="">Select atribut</option>
                            <?php 
                            include('../assets/koneksi.php');
                            $query = "SELECT * FROM laundry";
                            $q = mysqli_query($koneksi, $query);
                            while($var = mysqli_fetch_array($q)) { 
                            ?>
                            <option value="<?php echo $var['kode_laundry'];?>">
                                <?php echo $var['atribut']; ?></option>
                            <?php } ?>
                        </select>
                        <?php 
                                        if(isset($_SESSION['msg']['laundry_kode'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['laundry_kode'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="tgl_masuk">Tanggal Masuk Ke Laundry</label>
                        <input type="date"
                            class="form-control <?php echo (isset($_SESSION['msg']['tgl_masuk'])) ? 'border-danger' : null; ?>"
                            id="tgl_masuk" name="tgl_masuk" placeholder="dd-mm-yyyy"
                            value="<?php echo (isset($_SESSION['value']['tgl_masuk'])) ? $_SESSION['value']['tgl_masuk'] : null; ?>">
                        <?php if (isset($_SESSION['msg']['tgl_masuk'])) {
                            echo '<span class="text-danger">' . $_SESSION['msg']['tgl_masuk'] . '</span>';
                        } ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="total_harga">Total Harga</label>
                        <input type="number"
                            class="form-control <?php echo (isset($_SESSION['msg']['total_harga'])) ? 'border-danger' : null; ?>"
                            id="total_harga" name="total_harga" placeholder="0.000.000"
                            value="<?php echo (isset($_SESSION['value']['total_harga'])) ? $_SESSION['value']['total_harga'] : null; ?>">
                        <?php if (isset($_SESSION['msg']['total_harga'])) {
                            echo '<span class="text-danger">' . $_SESSION['msg']['total_harga'] . '</span>';
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