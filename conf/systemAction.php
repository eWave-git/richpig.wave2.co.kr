<?php
include_once "../connect.php";

$response = array();

foreach ($_REQUEST as $k => $v) {
    $$k = $v;
}

if ($mode == "create") {
    $query = "INSERT `system_data` SET
             member_id='{$member_id}',
             push_use_YN='{$push_use_YN}',
            update_at=now() ";
} else if ($mode == "update") {
    $query = "UPDATE `system_data` SET
                 push_use_YN='{$push_use_YN}',
                update_at=now() where member_id='{$member_id}'";
}

$result = mysqli_query($conn, $query);



header("Location:../AdminLTE/system.php");

?>