<?php 
if(!isset($_POST['btn'])){
    header('location:../login.php');
    exit();
}
// proses login
// ============
// ambil username dan password yg diinput
$user_form = $_POST['username'];
$pass_form = $_POST['password'];
// validasi kosong atau tidak
session_start();
if($user_form==''){
    $_SESSION['msg-user'] = "Username tidak boleh kosong.";
}
if($pass_form==''){
    $_SESSION['msg-pass'] = "Password tidak boleh kosong.";
}

if(isset($_SESSION['msg-user']) || isset($_SESSION['msg-pass'])){
    header('location:../login.php');
    exit();
}

// cek benar / salah
// koneksi
$conn = mysqli_connect('localhost', 'root', '', 'laundry');
$sql = "SELECT * FROM users WHERE users='$user_form' AND password='$pass_form'";
$q = mysqli_query($conn, $sql);
$numRow = mysqli_num_rows($q);
if($numRow == 0){
    $_SESSION['msg-global'] = "username dan password anda salah.";
    header('location:../login.php');
    exit();
}

// login
$_SESSION['login'] = true;
header('location:../../pages/?page=dashboard');



?>