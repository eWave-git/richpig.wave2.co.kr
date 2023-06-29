<?php
session_start();
include_once "../connect.php";

$query = "
    select
        DATE_FORMAT(create_at, '%Y-%m-%d %H:00:00') as DATE,
        sum(data5) as water_in,
        sum(data6) as water_out
    FROM raw_data_12ch where (create_at >= now() - INTERVAL 12 HOUR)
    group by DATE
    order by DATE asc;
";

$result = mysqli_query($conn, $query);
$rows = array();
while($row = mysqli_fetch_array($result))
    $rows[] = $row;


$water_in_arr = array();
$water_out_arr = array();
$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($water_in_arr, array($k, floor($v['water_in'])));
    array_push($water_out_arr, array($k, floor($v['water_out'])));
    array_push($create_at_arr, array($k, substr($v['DATE'],11,5)));
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