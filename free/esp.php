<?php
foreach ($_REQUEST as $k => $v) {
		$$k = $v;
}


$date = date("Y-m-d");
$time = date("His");
$create_at = date("Y-m-d H:i:s");
$from_ip = $_SERVER['REMOTE_ADDR'];
$conn = mysqli_connect("database-1.cvdze1lptugg.ap-northeast-2.rds.amazonaws.com","wave2","crss6801!!","richpig") or die ("Can't access DB");

$address = $add;

//$bd_num = $bd;
//$bd_type = substr($bd_num, 0, 1);
//$bd_number = substr($bd_num, 1, 1);


if ($bd_type != 1) {

	if ($address == '999') {
		$d1 = 0;
		$d2 = 0;
	} else if ($address == '998') {
		$d1 = 0;
		$d2 = 0;
	}

	if ($bd_type == 9) {
//		$d1 = round($d1 / 10,1);
		
	} 

	$sql = "INSERT INTO richpig.raw_data (`create_at`,`address`,`board_type`,`board_number`,`data1`,`data2`,`data3`,`data4`,`data5`,`data6`,`data7`)
    		VALUES ('{$create_at}', $address, $bd_type, $bd_number, $d1, $d2, $d3, $d4, $d5, $d6, $d7)";

	$result = mysqli_query($conn, $sql);
}
/*
$control_sql = "select * from rich.control_data where address = $address and board_type = $bd_type and board_number = $bd_number order by create_at desc limit 1 ";

$result = mysqli_query($conn, $control_sql);
$row = mysqli_fetch_array($result);

if ($row['idx']) {

	$relay1 = $row['relay1'] == '' ? 0 : $row['relay1'];
	$relay2 = $row['relay2'] == '' ? 0 : $row['relay2'];


	$str = "X000Y".$relay1.$relay2."00#";

	$textdata = "@".$time.$str;

} else {
	$textdata = "@".$time."X000Y0000#<br>";
}


echo $textdata;
 */



// http://ri.wave2.co.kr/free/data_write7.php?add=00000501&bd=43&d1=0ede9&d2=002fa&d3=00000&d4=00000&d5=00000&d6=00000&d7=00000&d8=00fff
// http://ri.wave2.co.kr/free/data_write_esp.php?add=00000501&bd=91&d1=024.5&d2=0088.90&d3=006112.210&d4=00000&d5=00000&d6=00000&d7=000fff
?>
 
