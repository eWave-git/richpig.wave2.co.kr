<?php
session_start();
include_once "../connect.php";

$response = array();

foreach ($_REQUEST as $k => $v) {
    $$k = $v;
}

$idx = $_SESSION['user_idx'];

if ($password) {
    $sql = "SELECT CONCAT('*', UPPER(SHA1(UNHEX(SHA1('{$password}'))))) as pass";
    $result = mysqli_query($conn, $sql);
    $row_p = mysqli_fetch_array($result);
    $password = $row_p['pass'];

}

$query = "UPDATE `member` SET
            `password`='{$password}'
            WHERE idx='{$idx}' ";


$result = mysqli_query($conn, $query);

header("Location:../AdminLTE/password_change.php");



