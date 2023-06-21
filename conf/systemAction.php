<?php
include_once "../connect.php";

$response = array();

foreach ($_REQUEST as $k => $v) {
    $$k = $v;
}


$query = "UPDATE `system_data` SET 
             push_use_YN='{$push_use_YN}',
            update_at=now() ";
$result = mysqli_query($conn, $query);


header("Location:../AdminLTE/system.php");

?>