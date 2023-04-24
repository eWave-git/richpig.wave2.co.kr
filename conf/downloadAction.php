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
function createdTable_2($rows, $field_1, $field_2, $field_3, $field_4, $field_5, $field_6, $field_7, $field_8) { // 선혁 만들어보고 있음
    echo "<table>";
    echo "<tr><td>{$field_1}</td><td>{$field_2}</td></tr>{$field_3}</td></tr>{$field_4}</td></tr>{$field_5}</td></tr>{$field_6}</td></tr>{$field_7}</td></tr>{$field_8}</td></tr>";
    foreach ($rows as $k => $v) {
        ?>
        <tr>
            <td><?php echo substr( $v[$field_1],0,16)?></td>
            <td><?php echo round($v[$field_2],2)?></td>
            <td><?php echo round($v[$field_3],2)?></td>
            <td><?php echo round($v[$field_4],2)?></td>
            <td><?php echo round($v[$field_5],2)?></td>
            <td><?php echo round($v[$field_6],2)?></td>
            <td><?php echo round($v[$field_7],2)?></td>
            <td><?php echo round($v[$field_8],2)?></td>
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
            address as address,
            board_type as type,
            board_number as num,
            data1 as temp,
            data2 as hu,
            data3 as co2,
            data4 as data4
        from raw_data
        where create_at >= '{$sdate}' and create_at <= '{$edate}'
        and board_number=2
        order by DATE asc
    ";

        $result = mysqli_query($conn, $query);
        $rows = array();
        while($row = mysqli_fetch_array($result))
            $rows[] = $row;

        createdTable_2($rows, 'DATE', 'address','type','num','data1','data2','data3','data4');



    } else if ($sensor == "data1") {
        $query = "
        select
            DATE_FORMAT(create_at, '%Y-%m-%d %H:%i:00') as DATE,
            data1
        from water.raw_data 
        where create_at >= '{$sdate}' and create_at <= '{$edate}'
        and board_number = 2
        
        order by DATE asc
    ";

        $result = mysqli_query($conn, $query);
        $rows = array();
        while($row = mysqli_fetch_array($result))
            $rows[] = $row;

        createdTable_1($rows, 'DATE', 'data1',);


    } else if ($sensor == "TDSOUT") {
        $query = "
            select
                DATE_FORMAT(create_at, '%Y-%m-%d %H:%i:00') as DATE,
                avg(data2) as data2
            from raw_data
            where create_at >= '{$sdate}' and create_at <= '{$edate}'
            group by DAY(create_at),FLOOR(MINUTE(create_at)/1)*10
            order by DATE asc
        ";

        $result = mysqli_query($conn, $query);
        $rows = array();
        while($row = mysqli_fetch_array($result))
            $rows[] = $row;

        createdTable_1($rows, 'data2','DATE');

    } else if ($sensor == "PRESSUREIN") {
        $query = "
            select
                DATE_FORMAT(create_at, '%Y-%m-%d %H:%i:00') as DATE,
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
