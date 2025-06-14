<!--page headings-->
<h1 class="h3 mb-4 text-gray-800">Form Laundry</h1>
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
                                    <div class="alert alert-success" role="alert">
                                        '.$_SESSION['msg']['success'].'
                                    </div>
                                ';
                            }
                        ?>
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Masukkan Data Laundry</h1>
                </div>
                <form action="MP/proses/input_post.php" method="POST" class="user">
                    <div class="form-group">
                        <input name="kode" type="text" class="form-control form-control-user"
                            placeholder="Masukkan Kode Laundry..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_kode'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_kode'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="nama" type="text" class="form-control form-control-user"
                            placeholder="Masukkan Atribut Laundry..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_nama'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_nama'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="no_hp" type="text" class="form-control form-control-user"
                            placeholder="Masukkan Nomor Handphone..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_no_hp'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_no_hp'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="alamat" type="text" class="form-control form-control-user"
                            placeholder="Masukkan Alamat..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_alamat'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_alamat'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="tanggal" type="text" class="form-control form-control-user"
                            placeholder="Masukkan Tanggal..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_tanggal'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_tanggal'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="status" type="text" class="form-control form-control-user"
                            placeholder="Masukkan Status..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_status'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_status'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="deskripsi" type="text" class="form-control form-control-user"
                            placeholder="Masukkan Deskripsi..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_deskripsi'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_deskripsi'].'</span>';
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