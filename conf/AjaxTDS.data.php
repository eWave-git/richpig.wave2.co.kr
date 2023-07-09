<?php
session_start();
include_once "../connect.php";

$query = "
    select
        DATE_FORMAT(create_at, '%Y-%m-%d %H:%i:00') as DATE,
        avg(data1) as tds_in,
        avg(data2) as tds_out
    from raw_data_12ch
    where (create_at >= now() - INTERVAL 1 HOUR)
    group by HOUR(create_at),FLOOR(MINUTE(create_at)/1)*10
    order by DATE asc ;
";

$result = mysqli_query($conn, $query);
$rows = array();
while($row = mysqli_fetch_array($result))
    $rows[] = $row;


$tds_in_arr = array();
$tds_out_arr = array();
$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($tds_in_arr, array($k, floor($v['tds_in'])));
    array_push($tds_out_arr, array($k, floor($v['tds_out'])));
    array_push($create_at_arr, array($k, substr($v['DATE'],11,5)));
}

$tds_in = array(
    'data' => $tds_in_arr,
    'color'=>'#3c8dbc',
);

$tds_out = array(
    'data' => $tds_out_arr,
    'color'=>'#00c0ef',
);

//echo "<xmp>";
//print_r($tds_in);
//echo "</xmp>";

$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('tds_in'=>$tds_in, 'tds_out'=>$tds_out,);
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>