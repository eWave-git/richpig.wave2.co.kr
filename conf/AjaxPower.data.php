<?php
session_start();
include_once "../connect.php";

$query = "
    select
        DATE_FORMAT(create_at, '%Y-%m-%d') as DATE,
        round(sum(current*380/1000),0) as power
    FROM raw_data_12ch
    where (create_at >= now() - INTERVAL 6 day)
    group by DATE
    order by DATE asc;
";
$result = mysqli_query($conn, $query);
$rows = array();
while($row = mysqli_fetch_array($result))
    $rows[] = $row;


$power_arr = array();

$create_at_arr = array();

foreach ($rows as $k => $v) {

    array_push($power_arr, array($k, floor($v['power'])));
    array_push($create_at_arr, array($k, $v['DATE']));
}

$power = array(
    'data' => $power_arr,
    'bars' => array('show'=>true,),
);


//echo "<xmp>";
//print_r($power);
//echo "</xmp>";

$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('power'=>$power,);
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>