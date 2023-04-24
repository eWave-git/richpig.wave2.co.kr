<?php
session_start();
include_once "conf/autoLogin.php";

if (!$_SESSION['user_id']) {
    error_loc_msg('/','로그인 후 사용 가능 합니다.');
}
?>