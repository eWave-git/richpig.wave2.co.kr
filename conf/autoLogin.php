<?php

if (isset($_COOKIE['cookie_id'])) {
    $query = mysqli_query($conn , "SELECT * FROM member WHERE id='{$_COOKIE['cookie_id']}'");

    if (mysqli_num_rows($query) == 1) {
        $row = mysqli_fetch_array($query);
        $_SESSION['user_idx'] = $row['idx'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_type'] = $row['type'];

        header("Location:../AdminLTE/");

    }
    exit;
}

?>