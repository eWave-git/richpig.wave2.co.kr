<?php
session_start();
include_once "../connect.php";
include_once "../lib/common.php";
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

error_loc_msg('/AdminLTE/password_change.php','비밀번호가 변경 되었습니다.');