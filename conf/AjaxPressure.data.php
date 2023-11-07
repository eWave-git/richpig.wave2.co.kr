<?php
session_start();
include_once "../connect.php";

$query = "
    select
        DATE_FORMAT(create_at, '%Y-%m-%d %H:%i:00') as DATE,
        avg(data3) as pressure_in,
        avg(data4) as pressure_out
    from raw_data_12ch
    where (create_at >= now() - INTERVAL 24 HOUR )
    group by HOUR(create_at),FLOOR(MINUTE(create_at)/1)*10
    order by DATE asc ;
";


$result = mysqli_query($conn, $query);
$rows = array();
while($row = mysqli_fetch_array($result))
    $rows[] = $row;


$pressure_in_arr = array();
$pressure_out_arr = array();
$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($pressure_in_arr, array($k, floor($v['pressure_in'])));
    array_push($pressure_out_arr, array($k, floor($v['pressure_out'])));
    array_push($create_at_arr, array($k, substr($v['DATE'],11,5)));
}

$pressure_in = array(
    'data' => $pressure_in_arr,
    'color'=>'#0000FF',
);

$pressure_out = array(
    'data' => $pressure_out_arr,
    'color'=>'#FF0000',
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