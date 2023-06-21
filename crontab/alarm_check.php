<?php
include_once $_SERVER['PWD']."/connect.php";
include_once $_SERVER['PWD']."/lib/common.php";

$query = "select * from `system_data`";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

if ($row['push_use_YN'] == 'Y') {
    $query_1 = "select * from `issue_data` order by idx desc limit 0,1";
    $result_1 = mysqli_query($conn, $query_1);
    $row_1 = mysqli_fetch_array($result_1);

    $address = $row_1['address'];
    $board_type = $row_1['board_type'];
    $board_number = $row_1['board_number'];

    $query_2 = "select * from king.`raw_data_upa2` where address='{$address}' and board_type='{$board_type}' and board_number='{$board_number}'  order by idx desc limit 0,1";
    $result_2 = mysqli_query($conn, $query_2);
    $row_2 = mysqli_fetch_array($result_2);


    if ($row_2 && $row_2[$row_1['data_channel']]) {
        $danger = false;

        if ($row_1['data_channel'] == "data1") {
            if ($row_1['min'] > $row_2[$row_1['data_channel']] || $row_1['max'] < $row_2[$row_1['data_channel']]) {
                issue_log_write($row_1['idx'], $row_2['idx'], "{$row_2['idx']}data1 값이 범위 밖에 데이터가 등록 되었습니다.", $row_1['target_user'], $row_2['create_at']);
            }
        }
    }


    /*************** push 발송  *****************/
    $query = "select * from `issue_log` where issue_idx={$row_1['idx']} and raw_idx={$row_2['idx']} and push_read_YN = 'N'  order by idx desc";
    $result = mysqli_query($conn, $query);
    $rows = array();
    while($row = mysqli_fetch_array($result))
        $rows[] = $row;

    $device_id = "";
    foreach ($rows as $k => $v) {
        if ($v['target_user']) {
            $query = "select * from `member` where id ='{$v['target_user']}' ";
            $result= mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);

            $device_id = $row['device_id'];
        };

        push_send("경보 발생", $v['contents'], $device_id);


    }

}

?>
