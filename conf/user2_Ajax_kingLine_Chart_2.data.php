<?php
include_once "../connect.php";

$query = "
    SELECT
        DATE_FORMAT(create_at, \"%y-%m-%d %H:%i\") as DF,
        data2
    from richpig.raw_data
    where address = 3001
        and board_number=4 
        and create_at >= now() - INTERVAL 24 hour
    group by  floor(DATE(DF)), floor(HOUR(DF)) ,floor(MINUTE(DF) / 10)
    order by idx asc;
    ";

$result = mysqli_query($conn, $query);
$rows = array();
while($row = mysqli_fetch_array($result))
    $rows[] = $row;


$pressure_in_arr = array();
$pressure_out_arr = array();
$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($pressure_in_arr, array($k, $v['data2']));
    array_push($create_at_arr, array($k, substr($v['DF'],9,13)));
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
