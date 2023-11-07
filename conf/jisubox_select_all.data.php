<?php
include_once "../connect.php";

foreach ($_REQUEST as $k => $v) {
    $$k = $v;
}

$s = explode(" - ",$sdateAtedate );
$sdate = $s[0]." 00:00";
$edate = $s[1]." 23:59";
$md_id;
$sensor;

if ($sensor == "TDSIN") {
    $query = "
    select
    DATE_FORMAT(created_at, '%Y-%m-%d %H:%i:00') as DATE,
    avg(data2) as tds_in
    from upa.raw_data
    where created_at >= '{$sdate}' and created_at <= '{$edate}' and address = 4002 and board_number=3
    group by DAY(created_at),FLOOR(MINUTE(created_at)/1)*10
    order by DATE asc ;
    ";

    $result = mysqli_query($conn, $query);
    $rows = array();
    while($row = mysqli_fetch_array($result))
        $rows[] = $row;

    $tds_in_arr = array();
    $create_at_arr = array();

    foreach ($rows as $k => $v) {
        array_push($tds_in_arr, array($k, $v['tds_in']));
        array_push($create_at_arr, array($k, substr($v['DATE'],0,11)));
    }

    $tds_in = array(
        'data' => $tds_in_arr,
        'color'=>'#3c8dbc',
    );

    $response = array();
    $response['pay_load']['success'] = "success";
    $response['pay_load']['datatype'] = "tds_in";
    $response['pay_load']['dataset'] = array('tds_in'=>$tds_in);
    $response['pay_load']['create_at'] = $create_at_arr;

    echo json_encode($response);

} else if ($sensor == "TDSOUT") {
    $query = "
    select
    DATE_FORMAT(created_at, '%Y-%m-%d %H:%i:00') as DATE,
    avg(data3) as tds_out
    from upa.raw_data
    where created_at >= '{$sdate}' and created_at <= '{$edate}' and address = 4002 and board_number=3
    group by DAY(created_at),FLOOR(MINUTE(created_at)/1)*10
    order by DATE asc ;
    ";

    $result = mysqli_query($conn, $query);
    $rows = array();
    while($row = mysqli_fetch_array($result))
        $rows[] = $row;

    $tds_out_arr = array();
    $create_at_arr = array();

    foreach ($rows as $k => $v) {
        array_push($tds_out_arr, array($k, $v['tds_out']));
        array_push($create_at_arr, array($k, substr($v['DATE'],6,5)));
    }

    $tds_out = array(
        'data' => $tds_out_arr,
        'color'=>'#3c8dbc',
    );

    $response = array();
    $response['pay_load']['success'] = "success";
    $response['pay_load']['datatype'] = "tds_out";
    $response['pay_load']['dataset'] = array('tds_out'=>$tds_out);
    $response['pay_load']['create_at'] = $create_at_arr;

    echo json_encode($response);

} else if ($sensor == "PRESSUREIN") {
    $query = "
    select
    DATE_FORMAT(created_at, '%Y-%m-%d %H:%i:00') as DATE,
    avg(data5) as pressure_in
    from upa.raw_data
    where created_at >= '{$sdate}' and created_at <= '{$edate}' and address = 4002 and board_number=3
    group by DAY(created_at),FLOOR(MINUTE(created_at)/1)*10
    order by DATE asc ;
    ";
    $result = mysqli_query($conn, $query);
    $rows = array();
    while ($row = mysqli_fetch_array($result))
        $rows[] = $row;


    $pressure_in_arr = array();
    $create_at_arr = array();

    foreach ($rows as $k => $v) {
        array_push($pressure_in_arr, array($k, floor($v['pressure_in'])));
        array_push($create_at_arr, array($k, substr($v['DATE'],0,16)));
    }

    $pressure_in = array(
        'data' => $pressure_in_arr,
        'color' => '#3c8dbc',
    );

    $response = array();
    $response['pay_load']['success'] = "success";
    $response['pay_load']['datatype'] = "pressure_in";
    $response['pay_load']['dataset'] = array('pressure_in' => $pressure_in);
    $response['pay_load']['create_at'] = $create_at_arr;

    echo json_encode($response);

} else if ($sensor == "PRESSUREOUT") {
    $query = "
        select
            DATE_FORMAT(created_at, '%Y-%m-%d %H:%i:00') as DATE,
            avg(data4) as pressure_out
        from upa.raw_data
        where created_at >= '{$sdate}' and created_at <= '{$edate}' and address = 4002 and board_number=3
        group by DAY(created_at),FLOOR(MINUTE(created_at)/1)*10
        order by DATE asc ;
    ";
    $result = mysqli_query($conn, $query);
    $rows = array();
    while ($row = mysqli_fetch_array($result))
        $rows[] = $row;


    $pressure_out_arr = array();
    $create_at_arr = array();

    foreach ($rows as $k => $v) {
        array_push($pressure_out_arr, array($k, floor($v['pressure_out'])));
        array_push($create_at_arr, array($k, substr($v['DATE'],0,16)));
    }

    $pressure_out = array(
        'data' => $pressure_out_arr,
        'color' => '#3c8dbc',
    );

    $response = array();
    $response['pay_load']['success'] = "success";
    $response['pay_load']['datatype'] = "pressure_out";
    $response['pay_load']['dataset'] = array('pressure_out' => $pressure_out);
    $response['pay_load']['create_at'] = $create_at_arr;

    echo json_encode($response);

} else if ($sensor == "WATERIN") {

    $query = "
        select
            DATE_FORMAT(created_at, '%Y-%m-%d %H:00:00') as DATE,
            sum(data5) as water_in
        FROM upa.raw_data 
        where created_at >= '{$sdate}' and created_at <= '{$edate}' and address = 4002 and board_number=2
        group by DATE
        order by DATE asc
    ";


    $result = mysqli_query($conn, $query);
    $rows = array();
    while($row = mysqli_fetch_array($result))
        $rows[] = $row;

    $water_in_arr = array();
    $create_at_arr = array();

    foreach ($rows as $k => $v) {
        array_push($water_in_arr, array($k, floor($v['water_in'])));
        array_push($create_at_arr, array($k, substr($v['DATE'],0,16)));
    }

    $water_in = array(
        'data' => $water_in_arr,
        'color'=>'#3c8dbc',
    );

    $response = array();
    $response['pay_load']['success'] = "success";
    $response['pay_load']['datatype'] = "water_in";
    $response['pay_load']['dataset'] = array('water_in'=>$water_in);
    $response['pay_load']['create_at'] = $create_at_arr;

    echo json_encode($response);

} else if ($sensor == "WATEROUT") {

    $query = "
    select
    DATE_FORMAT(created_at, '%Y-%m-%d %H:00:00') as DATE,
    sum(data6) as water_out
    FROM upa.raw_data 
    where created_at >= '{$sdate}' and created_at <= '{$edate}' and address = 4002 and board_number=2
    group by DATE
    order by DATE asc
    ";

    $result = mysqli_query($conn, $query);
    $rows = array();
    while($row = mysqli_fetch_array($result))
        $rows[] = $row;

    $water_out_arr = array();
    $create_at_arr = array();

    foreach ($rows as $k => $v) {
        array_push($water_out_arr, array($k, floor($v['water_out'])));
        array_push($create_at_arr, array($k, substr($v['DATE'],0,16)));
    }

    $water_out = array(
        'data' => $water_out_arr,
        'color'=>'#3c8dbc',
    );

    $response = array();
    $response['pay_load']['success'] = "success";
    $response['pay_load']['datatype'] = "water_out";
    $response['pay_load']['dataset'] = array('water_out'=>$water_out);
    $response['pay_load']['create_at'] = $create_at_arr;

    echo json_encode($response);

} else if ($sensor == "THROUGHPUT") {

    $query = "
        select
        DATE_FORMAT(created_at, '%Y-%m-%d %H:00:00') as DATE,
            round((sum(data5)-sum(data5-data6)),0) as throughput
        FROM upa.raw_data
        where created_at >= '{$sdate}' and created_at <= '{$edate}'
            group by DATE
            order by DATE asc;
    ";
    $result = mysqli_query($conn, $query);
    $rows = array();
    while($row = mysqli_fetch_array($result))
        $rows[] = $row;


    $throughput_arr = array();

    $create_at_arr = array();

    foreach ($rows as $k => $v) {
        array_push($throughput_arr, array($k, floor($v['throughput'])));
        array_push($create_at_arr, array($k, substr($v['DATE'],11,5)));
    }

    $throughput = array(
        'data' => $throughput_arr,
        'color'=>'#3c8dbc',
    );

    $response = array();
    $response['pay_load']['success'] = "success";
    $response['pay_load']['datatype'] = "throughput";
    $response['pay_load']['dataset'] = array('throughput'=>$throughput,);
    $response['pay_load']['create_at'] = $create_at_arr;

    echo json_encode($response);

} else if ($sensor == "bar1") {

    $query = "
        select
            DATE_FORMAT(create_at, '%Y-%m-%d') as DATE,
            round(max(data1,1) as power
        FROM water.raw_data
        where create_at >= '{$sdate}' and create_at <= '{$edate}' and board_number = 2
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

    $response = array();
    $response['pay_load']['success'] = "success";
    $response['pay_load']['datatype'] = "power";
    $response['pay_load']['dataset'] = array('power'=>$power,);
    $response['pay_load']['create_at'] = $create_at_arr;

    echo json_encode($response);

}


?>