<?php
include_once "../connect.php";

$query = "
    select
        DATE_FORMAT(create_at, '%m-%d %H:%i') as DATE,
        data2
    from mush.raw_data
    where
        address = 401 and board_number = 2 and
        create_at >= now() - INTERVAL 4 hour
    order by DATE asc;
    "; 
//create_at >= now() - INTERVAL 30 minute
$result = mysqli_query($conn, $query);
$rows = array();
while($row = mysqli_fetch_array($result))
    $rows[] = $row;


$pressure_in_arr = array();
$pressure_out_arr = array();
$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($pressure_in_arr, array($k, $v['data2']));
//    array_push($pressure_in_arr, array($k, floor($v['data2'])));
//    array_push($pressure_out_arr, array($k, floor($v['pressure_out'])));
    array_push($create_at_arr, array($k, substr($v['DATE'],6,5)));
}

$pressure_in = array(
    'data' => $pressure_in_arr,
    'color'=>'#3c8dbc',
);

$pressure_out = array(
    'data' => $pressure_out_arr,
    'color'=>'#00c0ef',
);

//echo "<xmp>";
//print_r($pressure_in);
//echo "</xmp>";

$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('pressure_in'=>$pressure_in, 'pressure_out'=>$pressure_out,);
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>
