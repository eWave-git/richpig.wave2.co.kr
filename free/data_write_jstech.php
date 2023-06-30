<?php
  ini_set( 'display_errors', '1' );

// data_write_ro_jstech.php
// DB --> idx, create_at, board_ip, mb_id, tds_in, tds_out, pressure_in, pressure_out, water_in, water_out, current, level_origin, level_acid, level_alkali, level_cip, status_work, status_cip

// S=mb_id-tds_in-tds_out-pressure_in-pressure_out-water_in-water_out-current-level_origin-level_acid-level_alkali-level_cip-status_work-status_cip
// S=15379-8000-500-23-21-2.1-1.8-135-87-65-91-75-1-1
// http://ewave.kr/data_write_ro_jstech.php?S=15379-8000-500-23-21-2.1-1.8-135-87-65-91-75-1-1


$from_ip = $_SERVER['REMOTE_ADDR'];
$get_time = date("Y-m-d H:i:s",$_SERVER['REQUEST_TIME']);
$time_board = date("H:i:s", $_SERVER['REQUEST_TIME']);
$data_board = date("Y-m-d", $_SERVER['REQUEST_TIME']);
$data = $_GET['S'];

$conn = mysqli_connect("database-2.cvdze1lptugg.ap-northeast-2.rds.amazonaws.com","wave2","crss6801!!","richpig") or die ("Can't access DB");
$array_data = explode('-',$data);

for ($i=0 ; $i<14; $i++)
{
        $array_data[$i] = $array_data[$i];
		
}
$num=1;


$query = "insert into jstech.ro_jstech (create_at, board_ip, mb_id, tds_in, tds_out, pressure_in, pressure_out, water_in, water_out, current, level_origin, level_acid, level_alkali, level_cip, status_work) 
                   values('".$get_time."','".$from_ip."','".$array_data[0]."','".$array_data[1]."','".$array_data[2]."','".$array_data[3]."','".$array_data[4]."','".$array_data[5]."','".$array_data[6]."','".$array_data[7]."','".$array_data[8]."','".$array_data[9]."','".$array_data[10]."','".$array_data[11]."','".$array_data[12]."')";
$resut=mysqli_query($conn,$query);


mysqli_close($conn);

?>
