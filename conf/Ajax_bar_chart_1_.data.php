<?php
include_once "../connect.php";

$query = "
    select
        DATE_FORMAT(create_at, '%m-%d ') as DATE,
        round((max(data1)-ifnull( LAG(max(data1)) OVER (ORDER BY create_at, idx), 0)),1) as data1
    from water.raw_data
    where create_at >= now() - INTERVAL 4 day
         and address=101 and board_type=3 and board_number=3
    group by DATE
    order by DATE asc;";

$result = mysqli_query($conn, $query);
$rows = array();
while($row = mysqli_fetch_array($result))
    $rows[] = $row;


$power_arr = array();

$create_at_arr = array();

foreach ($rows as $k => $v) {

    array_push($power_arr, array($k, floor($v['data1'])));
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
