<?php
session_start();
include_once "../connect.php";

$query = "
    SELECT data8, data9, data10, data11
    FROM raw_data_12ch
    order by create_at desc limit 1,1;
";
$result = mysqli_query($conn, $query);
$rows = array();
while($row = mysqli_fetch_array($result))
    $rows[] = $row;

$watertank_arr = array();

$create_at_arr = array();


array_push($watertank_arr, array(0, floor($rows[0]['data8'])));
array_push($watertank_arr, array(1, floor($rows[0]['data9'])));
array_push($watertank_arr, array(2, floor($rows[0]['data10'])));
array_push($watertank_arr, array(3, floor($rows[0]['data11'])));


array_push($create_at_arr, array(0, 'level_origin'));
array_push($create_at_arr, array(1, 'level_acid'));
array_push($create_at_arr, array(2, 'level_cip'));
array_push($create_at_arr, array(3, 'level_alkali'));



$watertank = array(
    'data' => $watertank_arr,
    'bars' => array('show'=>true,),
);


//echo "<xmp>";
//print_r($watertank);
//echo "</xmp>";


$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('watertank'=>$watertank,);
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>