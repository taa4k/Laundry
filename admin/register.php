<?php 
session_start();
if(isset($_SESSION['login'])){
    header('location:index.php');
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Account</title>
    <link rel="shortcut icon" type="image/png" href="./assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="../assets/images/logos/logo.svg" alt="">
                                </a>
                                <p class="text-center">REGISTRASI</p>
                                <form class="user" action="proses/registrasi_post.php" method="POST">
                                    <?php 
                                if(isset($_SESSION['msg-global'])){
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $_SESSION['msg-global'] ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                    <div class="mb-3">
                                        <label for="exampleInputtext1" class="form-label">Name</label>
                                        <input type="text"
                                            value="<?= (isset($_SESSION['username_cache']))?$_SESSION['username_cache']:null ?>"
                                            class="form-control <?= (isset($_SESSION['msg-user']))?"is-invalid":null ?>"
                                            id="exampleInputtext1" aria-describedby="textHelp" name="username">
                                        <?php 
                                    if(isset($_SESSION['msg-user'])){
                                    ?>

                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $_SESSION['msg-user'] ?>
                                        </div>

                                        <?php
                                    }
                                    ?>
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password"
                                            class="form-control <?= (isset($_SESSION['msg-pass']))?"is-invalid":null ?>"
                                            id="exampleInputPassword1" name="password">
                                        <?php 
                                        if(isset($_SESSION['msg-pass'])){
                                        ?>

                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $_SESSION['msg-pass'] ?>
                                        </div>

                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" name="bttn"
                                        type="submit">Masuk!</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                                        <a class="text-primary fw-bold ms-2" href="login.php">Sign
                                            In</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>