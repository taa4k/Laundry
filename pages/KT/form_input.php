<!--page headings-->
<h1 class="h3 mb-4 text-gray-800">FORM TRANSAKSI</h1>
<hr>
<!-- content -->
<div class="row justify-content-start">
    <div class="col-lg-6">
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
                                    <div class="alert alert-success" role="salert">
                                        '.$_SESSION['msg']['success'].'
                                    </div>
                                ';
                            }
                        ?>
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Masukkan Data TRANSAKSI</h1>
                </div>
                <form action="LY/proses/input_post.php" method="POST" class="user">
                    <div class="form-group">
                        <input name="kode" type="text" class="form-control form-control-user"
                            placeholder="kode Laundry..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_kode'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_kode'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="nama" type="text" class="form-control form-control-user"
                            placeholder="Nama pelanggan..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_nama'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_nama'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="atribut" type="text" class="form-control form-control-user"
                            placeholder="Atribut..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_atribut'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_atribut'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="tanggal_masuk" type="text" class="form-control form-control-user"
                            placeholder="Tanggal masuk..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_tanggal_masuk'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_tanggal_masuk'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="tanggal_keluar" type="text" class="form-control form-control-user"
                            placeholder="Tanggal keluar..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_tanggal_keluar'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_tanggal_keluar'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="status_laundry" type="text" class="form-control form-control-user"
                            placeholder="Status Laundry..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_status_laundry'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_status_laundry'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="total_harga" type="text" class="form-control form-control-user"
                            placeholder="Total Harga..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_total_harga'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_total_harga'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="pembayaran" type="text" class="form-control form-control-user"
                            placeholder="Status Pembayaran..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_pembayaran'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_pembayaran'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <!-- Tombol Login di kanan bawah -->
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary btn-user" name="btn-submit" type="submit">
                            SUBMIT!
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
unset($_SESSION['msg']);
?>