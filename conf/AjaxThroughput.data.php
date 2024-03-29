<?php
session_start();
include_once "../connect.php";

$query = "
    select
	DATE_FORMAT(created_at, '%Y-%m-%d %H:00:00') as DATE,
        round((sum(data5)-sum(data5-data6)),0) as throughput
    FROM upa.raw_data
    where (created_at >= now() - INTERVAL 72 HOUR) and board_type=3
	    group by DATE
	    order by DATE asc;
";
$result = mysqli_query($conn, $query);
$rows = array();
while($row = mysqli_fetch_array($result))
    $rows[] = $row;


$throughput_arr = array();

$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($throughput_arr, array($k, floor($v['throughput'])));
    array_push($create_at_arr, array($k, substr($v['DATE'],11,5)));
}

$throughput = array(
    'data' => $throughput_arr,
    'color'=>'#0000FF',
);


//echo "<xmp>";
//print_r($throughput);
//echo "</xmp>";

$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('throughput'=>$throughput,);
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>