<?php
session_start();
include_once "../connect.php";

foreach ($_REQUEST as $k => $v) {
    $$k = $v;
}


if ($temperature && is_numeric($temperature)) {

    $commend = 'mosquitto_pub -h 13.209.31.152 -t andante/peltier/tempset -u ewave -P andante -m "{\"temp\":'.$temperature.'}"';
    $output=null;
    $retval=null;
    exec($commend, $output, $retval);

}

header("Location:../AdminLTE/temperature_setting.php");