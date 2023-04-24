<?php
session_start();
include_once "./lib/common.php";

unset($_SESSION['user_idx']);
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
unset($_SESSION['user_type']);

setcookie('cookie_id', '', time() - 100, '/');

session_destroy();

error_loc_msg('/','로그아웃 되었습니다.');
?>