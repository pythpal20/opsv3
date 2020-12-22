<?php 
session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);

$conn = mysqli_connect('localhost', 'root', '', 'kendaraan');

$result = mysqli_query($conn, "select * from user where username='$username' and password='$password'");

$check = mysqli_num_rows($result);
if($result > 0) {
    $data = mysqli_fetch_assoc($result);
    $_SESSION['id'] = $data['user_ID'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['username'] = $data['username'];
    header('Location: dashboard.php');
} else {
    header('Location: login.php');
}