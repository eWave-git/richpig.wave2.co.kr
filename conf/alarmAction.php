<?php
session_start();
include_once "../connect.php";

foreach ($_REQUEST as $k => $v) {
    $$k = $v;
}

if ($mode == "create") {
    $query = "INSERT INTO `issue_data` SET address='{$address}',
        board_type='{$board_type}',
        board_number='{$board_number}',
        data_channel='{$data_channel}',
        `min`='{$min}',
        `max`='{$max}',
        target_user = '{$target_user}',
        create_at=now() ";


    $result = mysqli_query($conn, $query);

} else if ($mode == "delete") {
    $query = "DELETE FROM `issue_data` WHERE idx='{$idx}' ";
    $result = mysqli_query($conn, $query);
}


header("Location:../AdminLTE/alarm.php");