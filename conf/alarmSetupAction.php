<?php
session_start();
include_once "../connect.php";

foreach ($_REQUEST as $k => $v) {
    $$k = $v;
}

if ($system_data_mode == "create") {
    $query = "INSERT `system_data` SET
             member_id='{$member_id}',
             push_use_YN='{$push_use_YN}',
            update_at=now() ";
} else if ($system_data_mode == "update") {
    $query = "UPDATE `system_data` SET
             push_use_YN='{$push_use_YN}',
            update_at=now() where member_id='{$member_id}'";
}

$result = mysqli_query($conn, $query);

if ($min && $max) {

    $query = "INSERT INTO `issue_data` SET
        member_id='{$member_id}', 
        address='{$address}',
        board_type='{$board_type}',
        board_number='{$board_number}',
        data_channel='{$data_channel}',
        `min`='{$min}',
        `max`='{$max}',
        target_user = '{$target_user}',
        create_at=now() ";

    $result = mysqli_query($conn, $query);
}


header("Location:../AdminLTE/alarm_setup.php");