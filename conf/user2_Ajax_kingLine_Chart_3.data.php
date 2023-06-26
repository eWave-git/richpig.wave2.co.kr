<?php
include_once "../connect.php";

$query = "
    SELECT
        DATE_FORMAT(create_at, \"%y-%m-%d %H:%i\") as DF,
        data1
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


$water_in_arr = array();
$water_out_arr = array();
$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($water_in_arr, array($k, ($v['data1'])));
//    array_push($water_out_arr, array($k, floor($v['water_out'])));
    array_push($create_at_arr, array($k, substr($v['DF'],9,13)));
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
