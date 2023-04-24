<?php
include_once "../connect.php";

$query = "
    select
        DATE_FORMAT(create_at, '%m-%d %H:%i') as DATE,
        data2
    from mush.raw_data
    where
        address = 401 and board_number = 3  and
        create_at >= now() - INTERVAL 4 hour
    order by DATE asc;
    "; 
//create_at >= now() - INTERVAL 30 minute
$result = mysqli_query($conn, $query);
$rows = array();
while($row = mysqli_fetch_array($result))
    $rows[] = $row;


$throughput_arr = array();

$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($throughput_arr, array($k, $v['data2']));
    //array_push($throughput_arr, array($k, floor($v['data3'])));
    array_push($create_at_arr, array($k, substr($v['DATE'],6,5)));
}

$throughput = array(
    'data' => $throughput_arr,
    'color'=>'#3c8dbc',
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
