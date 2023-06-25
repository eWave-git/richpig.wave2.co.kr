<?php



include_once "../connect.php";



foreach ($_REQUEST as $k => $v) {
    $$k = $v;
}


function createdTable_1($rows, $field_1, $field_2) {
    echo "<table>";
    echo "<tr><td>{$field_1}</td><td>{$field_2}</td></tr>";
    foreach ($rows as $k => $v) {
        ?>
        <tr>
            <td><?php echo substr( $v[$field_1],0,16)?></td><td><?php echo round($v[$field_2],2)?></td>
        </tr>
        <?php
    }
    echo "</table>";
}
function createdTable_2($rows, $field_1, $field_2, $field_3, $field_4) { 
    echo "<table>";
    echo "<tr><td>{$field_1}</td><td>{$field_2}</td><td>{$field_3}</td><td>{$field_4}</td></tr>";
    foreach ($rows as $k => $v) {
        ?>
        <tr>
            <td><?php echo substr( $v[$field_1],0,16)?></td>
            <td><?php echo round($v[$field_2],2)?></td>
            <td><?php echo round($v[$field_3],2)?></td>
            <td><?php echo round($v[$field_4],2)?></td>
        </tr>
        <?php
    }
    echo "</table>";
}

if ($md_id && $sensor && $sdateAtedate) {

    $file_name = $sensor."_excel.xls";

    header( "Content-type: application/vnd.ms-excel; charset=utf-8");     // 아래 3줄을 주석 처리하면 화면에 데이터를 뿌려줌
    header( "Content-Disposition: attachment; filename = $file_name" );     //filename = 저장되는 파일명을 설정합니다.
    header( "Content-Description: PHP4 Generated Data" );


    $s = explode(" - ",$sdateAtedate );
    $sdate = $s[0]." 00:00:00";
    $edate = $s[1]." 23:59:59";

    if ($sensor == "dataAll") {
        $query = "
        select
            DATE_FORMAT(create_at, '%Y-%m-%d %H:%i') as DATE,
            board_number as number,
            data1 as temperature,
            data2 as humidity
        from richpig.raw_data
        where address = '{$md_id}' and
            create_at >= '{$sdate}' and create_at <= '{$edate}'
        order by DATE asc
    ";

        $result = mysqli_query($conn, $query);
        $rows = array();
        while($row = mysqli_fetch_array($result))
            $rows[] = $row;

        createdTable_2($rows, 'DATE', 'number','temperature','humidity');



    } else if ($sensor == "data1") {
        $query = "
        select
            DATE_FORMAT(create_at, '%Y-%m-%d %H:%i:00') as DATE,
            board_number as number,
            data1 as temperature
        from richpig.raw_data
        where address = '{$md_id}' and 
            create_at >= '{$sdate}' and create_at <= '{$edate}'
        order by DATE asc
    ";

        $result = mysqli_query($conn, $query);
        $rows = array();
        while($row = mysqli_fetch_array($result))
            $rows[] = $row;

        createdTable_1($rows, 'DATE', 'temperature',);


    } else if ($sensor == "data2") {
        $query = "
            select
                DATE_FORMAT(create_at, '%Y-%m-%d %H:%i:00') as DATE,
                board_number as number,
                data2 as humidity
            from richpig.raw_data
            where address = '{$md_id}' and 
            create_at >= '{$sdate}' and create_at <= '{$edate}'
            order by DATE asc
        ";

        $result = mysqli_query($conn, $query);
        $rows = array();
        while($row = mysqli_fetch_array($result))
            $rows[] = $row;

        createdTable_1($rows, 'DATE', 'humidity');

    } else if ($sensor == "PRESSUREIN") {
        $query = "
            select
                DATE_FORMAT(create_at, '%Y-%m-%d %H:%i:00') as DATE,
                board_number as number,
                avg(data3) as data3
            from raw_data
            where create_at >= '{$sdate}' and create_at <= '{$edate}'
            group by DAY(create_at),FLOOR(MINUTE(create_at)/1)*10
            order by DATE asc
        ";

        $result = mysqli_query($conn, $query);
        $rows = array();
        while($row = mysqli_fetch_array($result))
            $rows[] = $row;

        createdTable_1($rows, 'data3','DATE');

    } else if ($sensor == "PRESSUREOUT") {
        $query = "
            select
                DATE_FORMAT(create_at, '%Y-%m-%d %H:%i:00') as DATE,
                board_number as number,
                avg(data4) as data4
            from raw_data
            where create_at >= '{$sdate}' and create_at <= '{$edate}'
            group by DAY(create_at),FLOOR(MINUTE(create_at)/1)*10
            order by DATE asc
        ";

        $result = mysqli_query($conn, $query);
        $rows = array();
        while($row = mysqli_fetch_array($result))
            $rows[] = $row;

        createdTable_1($rows, 'data4','DATE');

    } else if ($sensor == "WATERIN") {

        $query = "
            select
                DATE_FORMAT(create_at, '%Y-%m-%d %H:%i:00') as DATE,
                board_number as number,
                avg(data5) as data5
            from raw_data
            where create_at >= '{$sdate}' and create_at <= '{$edate}'
            group by DAY(create_at),FLOOR(MINUTE(create_at)/1)*10
            order by DATE asc
        ";

        $result = mysqli_query($conn, $query);
        $rows = array();
        while($row = mysqli_fetch_array($result))
            $rows[] = $row;

        createdTable_1($rows, 'data5','DATE');

    } else if ($sensor == "WATEROUT") {

        $query = "
            select
                DATE_FORMAT(create_at, '%Y-%m-%d %H:%i:00') as DATE,
                board_number as number,
                avg(data6) as data6
            from raw_data
            where create_at >= '{$sdate}' and create_at <= '{$edate}'
            group by DAY(create_at),FLOOR(MINUTE(create_at)/1)*10
            order by DATE asc
        ";

        $result = mysqli_query($conn, $query);
        $rows = array();
        while($row = mysqli_fetch_array($result))
            $rows[] = $row;

        createdTable_1($rows, 'data6','DATE');

    } else if ($sensor == "THROUGHPUT") {

        $query = "
            select
                DATE_FORMAT(create_at, '%Y-%m-%d %H:%i:00') as DATE,
                board_number as number,
                avg(data7) as data7
            from raw_data
            where create_at >= '{$sdate}' and create_at <= '{$edate}'
            group by DAY(create_at),FLOOR(MINUTE(create_at)/1)*10
            order by DATE asc
        ";

        $result = mysqli_query($conn, $query);
        $rows = array();
        while($row = mysqli_fetch_array($result))
            $rows[] = $row;

        createdTable_1($rows, 'data7','DATE');

    } else if ($sensor == "POWER") {
        // 모름

    }


}
