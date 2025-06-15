<!--page headings-->
<h1 class="h3 mb-4 text-gray-800">Form Karyawan</h1>
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
                    <h1 class="h4 text-gray-900 mb-4">Masukkan Data Karyawan</h1>
                </div>
                <form action="MK/proses/input_post.php" method="POST" class="user">
                    <div class="form-group">
                        <input name="kode" type="text" class="form-control form-control-user"
                            placeholder="Masukkan kode karyawan..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_kode'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_kode'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="nama" type="text" class="form-control form-control-user"
                            placeholder="Masukkan Nama Karyawan..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_nama'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_nama'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="no_hp" type="text" class="form-control form-control-user"
                            placeholder="Masukkan Nomor Induk Kependudukan..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_nik'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_nik'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="alamat" type="text" class="form-control form-control-user"
                            placeholder="Masukkan Jenis Kelamin..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_jk'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_jk'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="tanggal" type="text" class="form-control form-control-user"
                            placeholder="Masukkan Tanggal Lahir..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_tanggal'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_tanggal'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="status" type="text" class="form-control form-control-user"
                            placeholder="Masukkan Alamat..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_alamat'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_alamat'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input name="deskripsi" type="text" class="form-control form-control-user"
                            placeholder="Masukkan Nomor Handphone..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_no_hp'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_no_hp'].'</span>';
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