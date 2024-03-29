<?php
include_once "/var/www/richpig/connect.php";
include_once "/var/www/richpig/lib/common.php";

$member_array = array('savebox1', 'savebox2', 'savebox3', 'savebox4', 'savebox5');

foreach ($member_array as $mak => $mav) {

    $query = "select * from `system_data` where member_id = '{$mav}'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if ($row['push_use_YN'] == 'Y') {

        $m_query = "select * from `member` where id='{$mav}' and `device_id` !='' ";
        $m_result = mysqli_query($conn, $m_query);
        while($m_row = mysqli_fetch_array($m_result))
            $m_rows[] = $m_row;

        if (is_countable($m_rows) && count($m_rows) > 0) {
            foreach ($m_rows as $mk => $mv ) {

                $query_1 = "select * from `issue_data` where `member_id`='{$mav}' and `target_user` = '{$mv['id']}' order by idx desc limit 0,1";
                $result_1 = mysqli_query($conn, $query_1);
                $row_1 = mysqli_fetch_array($result_1);

                if ($row_1) {
                    $address = $row_1['address'];
                    $board_type = $row_1['board_type'];
                    $board_number = $row_1['board_number'];

                    $query_2 = "select * from richpig.`raw_data` where address='{$address}' and board_type='{$board_type}' and board_number='{$board_number}'  order by idx desc limit 0,1";
                    $result_2 = mysqli_query($conn, $query_2);
                    $row_2 = mysqli_fetch_array($result_2);


                    if ($row_2 && $row_2[$row_1['data_channel']]) {
                        $danger = false;

                        if ($row_1['data_channel'] == "data1") {
                            if ($row_1['min'] > $row_2[$row_1['data_channel']] || $row_1['max'] < $row_2[$row_1['data_channel']]) {
                                $contents = $row_2['address'].$row_2['board_type'].$row_2['board_number']." 장치의 온도가 ".$row_2['data1']." 입니다. 설정값 ".$row_1['min']." ~ ".$row_1['max']." 범위 밖에 있습니다.";
                                issue_log_write($mav, $row_1['idx'], $row_2['idx'], $contents, $row_1['target_user'], $row_2['create_at']);
                            }
                        }

                        if ($row_1['data_channel'] == "data2") {
                            if ($row_1['min'] > $row_2[$row_1['data_channel']] || $row_1['max'] < $row_2[$row_1['data_channel']]) {
                                $contents = $row_2['address'].$row_2['board_type'].$row_2['board_number']." 장치의 습도가 ".$row_2['data2']." 입니다. 설정값 ".$row_1['min']." ~ ".$row_1['max']." 범위 밖에 있습니다.";
                                issue_log_write($mav, $row_1['idx'], $row_2['idx'], $contents, $row_1['target_user'], $row_2['create_at']);
                            }
                        }

                    }


                    /*************** push 발송  *****************/
                    $query = "select * from `issue_log` where `member_id`='{$mav}' and `issue_idx`={$row_1['idx']} and `raw_idx`={$row_2['idx']} and `push_read_YN` = 'N'  order by idx desc";

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

                        push_send($mav,"경보 발생", $v['contents'], $device_id);

                    }
                }
            }
        }
    }
}





?>
