<?php


foreach ($_REQUEST as $k => $v) {
		$$k = $v;
}

$date = date("Y-m-d");
$time = date("His");
$create_at = date("Y-m-d H:i:s");
$from_ip = $_SERVER['REMOTE_ADDR'];
$conn = mysqli_connect("database-1.cvdze1lptugg.ap-northeast-2.rds.amazonaws.com","wave2","crss6801!!","water") or die ("Can't access DB");


$bd_type = substr($bd, 0, 1);
$bd_number = substr($bd, 1, 1);


$sql = "INSERT INTO water.raw_data_8 (`create_at`,`address`,`board_type`,`board_number`,`data1`,`data2`,`data3`,`data4`,`data5`,`data6`,`data7`,`data8`)
    VALUES ('{$create_at}', $add, $bd_type, $bd_number, $d1, $d2, $d3, $d4, $d5, $d6, $d7, $d8)";

$result = mysqli_query($conn, $sql);


//$control_sql = "select * from jstech.control_data where address = $address and board_type = $bd_type and board_number = $bd_number order by create_at desc limit 1 ";

//$result = mysqli_query($conn, $control_sql);
//$row = mysqli_fetch_array($result);

//$relay1 = $row['relay1'] == '' ? 0 : $row['relay1']; 
//$relay2 = $row['relay2'] == '' ? 0 : $row['relay2']; 


//$str = "X000Y".$relay1.$relay2."00#";

//$textdata = "@".$time.$str;

//echo $sql;

$textdata = "@".$time."X000Y0000#<br>";
echo $textdata;





// http://localhost/ww.php?add=1&bd=1&type=1&d=1&d1=1&d2=1&d3=1
//include_once "./connect.php"
//http://localhost/ww.php?add=00000005&bd=3&type=2&d=0x01&d1=0x554f&d2=0x5477&d3=0x5599
?>
 
