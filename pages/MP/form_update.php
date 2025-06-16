<?php 
$kode = $_REQUEST['kode_pelanggan'];
include('../assets/koneksi.php');
$query = "SELECT * FROM pelanggan WHERE kode_pelanggan='$kode'";
$q = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($q);

?>
<!--page headings-->
<h1 class="h3 mb-4 text-gray-800">Form Pelanggan</h1>
<hr>
<!-- content -->
<div class="row justify-content-start">
    <div class="col-lg-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <a href="?page=MP/table"><i class="btn btn-dark btn-user ms-3 mt-3">Kembali</i></a>
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
                    <h1 class="h4 text-gray-900 mb-4">Masukkan Data Pelanggan</h1>
                </div>
                <form action="MP/proses/update_post.php" method="POST" class="user">
                    <div class="form-group">
                        <input readonly value="<?= $data['kode_pelanggan'] ?>" name="kode" type="text"
                            class="form-control form-control-user">
                    </div>
                    <br>
                    <div class="form-group">
                        <input value="<?= $data['nama_pelanggan'] ?>" name="nama" type="text"
                            class="form-control form-control-user">
                        <?php 
                                        if(isset($_SESSION['msg']['err_nama'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_nama'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input value="<?= $data['no_hp'] ?>" name="no_hp" type="text"
                            class="form-control form-control-user">
                        <?php 
                                        if(isset($_SESSION['msg']['err_no_hp'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_no_hp'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input value="<?= $data['alamat'] ?>" name="alamat" type="text"
                            class="form-control form-control-user">
                        <?php 
                                        if(isset($_SESSION['msg']['err_alamat'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_alamat'].'</span>';
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