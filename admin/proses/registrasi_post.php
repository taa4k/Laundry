<?php 

if(!isset($_POST['bttn'])){
    header('location:../login.php');
    exit();
}
// proses register
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

if(
    isset($_SESSION['msg-user']) || 
    isset($_SESSION['msg-pass']))
{
    $_SESSION['username_cache'] = $user_form;
    header('location:../register.php');
    exit();
}

$conn = mysqli_connect('localhost', 'root', '', 'laundry');
$sql = "SELECT * FROM users WHERE users='$user_form'";
$q = mysqli_query($conn, $sql);
$numRow = mysqli_num_rows($q);

if($numRow > 0){
    $_SESSION['msg-global'] = "Username sudah ada.";
    header('location:../register.php');
    exit();
}

// register
$sql = "INSERT INTO users (id, users, password) VALUES(null, '$user_form', '$pass_form')";
mysqli_query($conn, $sql);
header('location:../login.php');

?>