<!--page headings-->
<h1 class="h3 mb-4 text-gray-800">FORM LAUNDRY</h1>
<hr>
<!-- content -->
<div class="row justify-content-start">
    <div class="col-lg-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <a href="?page=LY/table"><i class="btn btn-dark btn-user ms-3 mt-3">Kembali</i></a>
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
                <form action="LY/proses/input_post.php" method="POST" class="user">
                    <div class="form-group">
                        <input name="atribut" type="text" class="form-control form-control-user"
                            placeholder="Masukkan Atribut..">
                        <?php 
                                        if(isset($_SESSION['msg']['err_atribut'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_atribut'].'</span>';
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