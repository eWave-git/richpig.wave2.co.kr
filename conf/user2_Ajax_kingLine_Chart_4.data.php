<?php
include_once "../connect.php";

$query = "
    SELECT
        DATE_FORMAT(create_at, \"%y-%m-%d %H:%i\") as DF,
        data2
        from richpig.raw_data
        where address = 3001
    and board_number=5 
    and create_at >= now() - INTERVAL 24 hour
    group by  floor(DATE(DF)), floor(HOUR(DF)) ,floor(MINUTE(DF) / 10)
    order by idx asc;
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
    array_push($create_at_arr, array($k, substr($v['DF'],9,13)));
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
