<?php
include_once "../connect.php";

$query = "
    select
        DATE_FORMAT(create_at, '%m-%d %H:%i') as DATE,
        data1
    from richpig.raw_data
    where
        address = 2307 and board_number = 1 and
        create_at >= now() - INTERVAL 1 hour
    order by DATE asc;
    ";

$result = mysqli_query($conn, $query);
$rows = array();
while($row = mysqli_fetch_array($result))
    $rows[] = $row;


$tds_in_arr = array();
$tds_out_arr = array();
$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($tds_in_arr, array($k, $v['data1']));
//    array_push($tds_out_arr, array($k, floor($v['data2'])));
    array_push($create_at_arr, array($k, substr($v['DATE'],6,5)));
}

$tds_in = array(
    'data' => $tds_in_arr,
    'color'=>'#FFA07A',
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
