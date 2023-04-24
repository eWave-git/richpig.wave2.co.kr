<?php
include_once "../connect.php";

if ($_REQUEST['relay'] == 'relay1') {
    $sql = "select * from control_data where type='relay2' order by create_at desc limit 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $relay2 = $row['relay2'];

    if ($_REQUEST['do_work'] == 'true') {
        $sql = "insert control_data set create_at=now(), address='1122', board_type='4', board_number='3', type='relay1', relay1='1', relay2='{$relay2}' ";
    } else if ($_REQUEST['do_work'] == 'false') {
        $sql = "insert control_data set create_at=now(), address='1122', board_type='4', board_number='3', type='relay1', relay1='0', relay2='{$relay2}' ";
    }

    mysqli_query($conn, $sql);

} else if ($_REQUEST['relay'] == 'relay2') {
    $sql = "select * from control_data where type='relay1' order by create_at desc limit 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $relay1 = $row['relay1'];

    if ($_REQUEST['do_work'] == 'true') {
        $sql = "insert control_data set create_at=now(), address='1122', board_type='4', board_number='3', type='relay2',  relay2='1', relay1='{$relay1}' ";
    } else if ($_REQUEST['do_work'] == 'false') {
        $sql = "insert control_data set create_at=now(), address='1122', board_type='4', board_number='3', type='relay2', relay2='0', relay1='{$relay1}' ";
    }
    mysqli_query($conn, $sql);
}


if ($_REQUEST['relay'] == 'relay1') {
    $sql = "select * from control_data where type='relay1' order by create_at desc limit 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $do_work = !$row['relay1'] && "" ? 0 : $row['relay1'];
} else if ($_REQUEST['relay'] == 'relay2') {
    $sql = "select * from control_data where type='relay2' order by create_at desc limit 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $do_work = !$row['relay2'] && "" ? 0 : $row['relay2'];
}

$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['do_work'] = $do_work;

echo json_encode($response);
?>
