<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">DATA PELANGGAN</h1>
    <hr>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">DATA PELANGGAN</h6>
        </div>
        <a href="?page=MP/form_input"><i class="btn btn-warning btn-user ms-3 mt-3">Tambah Pelanggan</i></a>
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
                            <th>Nomor</th>
                            <th>Kode Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Nomor Handphone</th>
                            <th>Alamat</th>
                            <th>aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                include('../assets/koneksi.php');
                                $query = "SELECT * FROM pelanggan";
                                $q = mysqli_query($koneksi, $query);
                                $no = 1;
                                while ($data = mysqli_fetch_array($q)) {
                            ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $data['kode_pelanggan'] ?></td>
                            <td><?= $data['nama_pelanggan'] ?></td>
                            <td><?= $data['no_hp'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td>
                                <a href="MP/proses/delete_post.php?kode_pelanggan=<?= $data['kode_pelanggan'] ?>"
                                    onclick="return confirm('Anda yakin menghapus data ini?')"><i
                                        class="btn btn-danger btn-user">hapus</i></a> |
                                <a href="?page=MP/form_update&kode_pelanggan=<?= $data['kode_pelanggan'] ?>"><i
                                        class="btn btn-primary btn-user">edit</i></a>
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