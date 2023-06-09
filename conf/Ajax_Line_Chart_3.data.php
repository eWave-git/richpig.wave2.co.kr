<?php
include_once "../connect.php";

$query = "
    select
        DATE_FORMAT(create_at, '%m-%d %H:%i') as DATE,
        data2
    from richpig.raw_data_mqtt
    where
        address = 1001 and
        create_at >= now() - INTERVAL 24 hour
    order by DATE asc;
    "; 
//create_at >= now() - INTERVAL 30 minute
$result = mysqli_query($conn, $query);
$rows = array();
while($row = mysqli_fetch_array($result))
    $rows[] = $row;


$water_in_arr = array();
$water_out_arr = array();
$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($water_in_arr, array($k, floor($v['data2'])));
//    array_push($water_out_arr, array($k, floor($v['water_out'])));
    array_push($create_at_arr, array($k, substr($v['DATE'],6,5)));
}

$water_in = array(
    'data' => $water_in_arr,
    'color'=>'#3c8dbc',
);

$water_out = array(
    'data' => $water_out_arr,
    'color'=>'#00c0ef',
);

//echo "<xmp>";
//print_r($water_in);
//echo "</xmp>";

$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('water_in'=>$water_in, 'water_out'=>$water_out,);
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>
