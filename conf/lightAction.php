<?php
session_start();
include_once "../connect.php";

foreach ($_REQUEST as $k => $v) {
    $$k = $v;
}

if ($light) {

    $_txt = $address.'/'.$board_type.'/'.$board_number;

    $commend = 'mosquitto_pub -h 13.209.31.152 -t Peltier/'.$_txt.'/Light/'.$light.' -u ewave -P andante -m '.$light.'';
    
    $output=null;
    $retval=null;
    exec($commend, $output, $retval);

}

header("Location:../AdminLTE/temperature_setting.php");