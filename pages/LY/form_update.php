<?php 
$kode = $_REQUEST['kode_laundry'];
include('../assets/koneksi.php');
$query = "SELECT * FROM laundry WHERE kode_laundry='$kode'";
$q = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($q);

?>
<!--page headings-->
<h1 class="h3 mb-4 text-gray-800">FORM LAUNDRY</h1>
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
                <form action="MP/proses/update_post.php" method="POST" class="user">
                    <div class="form-group">
                        <input readonly value="<?= $data['kode_laundry'] ?>" name="kode" type="text"
                            class="form-control form-control-user">
                    </div>
                    <br>
                    <div class="form-group">
                        <input value="<?= $data['atribut'] ?>" name="nama" type="text"
                            class="form-control form-control-user">
                        <?php 
                                        if(isset($_SESSION['msg']['err_nama'])){
                                            echo '<span class="text-danger">'.$_SESSION['msg']['err_nama'].'</span>';
                                        }
                                    ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <input value="<?= $data['deskripsi'] ?>" name="no_hp" type="text"
                            class="form-control form-control-user">
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