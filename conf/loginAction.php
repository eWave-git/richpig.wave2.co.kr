<?php
session_start();
include_once "../connect.php";

$username = $_POST['user_id'];
$password = $_POST['user_pw'];
$autologin = isset($_POST['autologin'] ) ? 'Y' : 'N';

$sql = "SELECT CONCAT('*', UPPER(SHA1(UNHEX(SHA1('{$password}'))))) as pass";
$result = mysqli_query($conn, $sql);
$row_p = mysqli_fetch_array($result);
$password = $row_p['pass'];

$query = mysqli_query($conn , "SELECT * FROM richpig.member WHERE id='$username' AND password='$password'");

if (mysqli_num_rows($query) == 1) {
    $row = mysqli_fetch_array($query);
    $_SESSION['user_idx'] = $row['idx'];
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['name'];
    $_SESSION['user_type'] = $row['type'];

    if ($autologin == "Y") {
        setcookie("cookie_id",$row['id'],(time()+3600*24*30),"/"); // 한달간 자동로그인 유지
    }

    header("Location:../AdminLTE/");

} else if ($username == '' || $password == '') {
    header("Location:../index.php?error=2");
} else {
    header("Location:../index.php?error=1");
}