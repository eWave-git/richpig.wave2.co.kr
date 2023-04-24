<?php

function error_loc_msg($loc,$msg,$target=null) {
    if($target) { echo "<script language='javascript'>alert('$msg');".$target.".location.href=('${loc}');</script>"; }
    else { echo "<script language='javascript'>alert('$msg');location.href=('${loc}');</script>"; }
    exit;
}

function print_r2($arr) {
    echo "<xmp>". print_r($arr , true) ."</xmp>";
    exit;
}

?>