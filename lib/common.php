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

function push_send($member_id, $push_title, $push_content, $individual = '') {
    global $conn;

    $push_url = "http://richpig.wave2.co.kr/AdminLTE/push_history.php";
    $img_url = "";
    $push_title_arr['en'] = $push_title;
    $push_content_arr['en'] = $push_content;

    $individual_arr = array();
    $individual_arr[] = $individual;
    $push_target = array('') ;

    $query = "INSERT INTO `push_send_data` SET
            member_id='{$member_id}',
            push_title='{$push_title}',
            push_content='{$push_content}',
            push_url='{$push_url}',
            img_url='{$img_url}',
            push_target='',
            push_id='{$individual}',
            send_YN='N',
            create_at=now() ";

    $result = mysqli_query($conn, $query);
    $last_uid = mysqli_insert_id($conn);

    $app_id = "ad255f06-bf9b-40e7-a20a-69313551d364";
    $restapi_key = "Y2Y1OGI1YmQtMzM4Yi00MzMwLTgwOTMtOTcyNDQ4NDQ5YjVj";



    $data['custom_url']= $push_url;

    $url = "https://onesignal.com/api/v1/notifications";
    $body = array(
        "app_id" => $app_id,
        "included_segments" => $push_target,
        "include_player_ids" => $individual_arr,
        "headings" => $push_title_arr,
        "contents" => $push_content_arr,
        "data" => $data,
        "small_icon" => "icon_48",
        "big_picture" => "",
        "ios_attachments" => "",
        "ios_badgeType" => "Increase",
        "ios_badgeCount" => "1"
    ); # type1
    $body = json_encode($body);
    if ($last_uid) {
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL			    => $url, //URL 지정하기
            CURLOPT_POST			=> true, //true시 post 전송
            CURLOPT_RETURNTRANSFER	=> true, //요청 결과를 문자열로 반환
            CURLOPT_HTTPHEADER		=> array(// header data
                "Content-Type:application/json",
                "Authorization: Basic ".$restapi_key
            ),
            CURLOPT_SSL_VERIFYPEER	=> 0,    //원격 서버의 인증서가 유효한지 검사 안함
            CURLOPT_POSTFIELDS		=> $body //POST data
        ));

        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $response= json_decode($response,true);
    }

    if (isset($response['id']) && $status_code == 200 ) {
        $query = "UPDATE `push_send_data` SET send_YN='Y', update_at=now() where idx = {$last_uid} ";
        $result = mysqli_query($conn, $query);
    }

    return $response;
}

function issue_log_write ($member_id, $issue_idx, $raw_idx, $contents, $target_user, $raw_create) {
    global $conn;

    $query = "select * from `issue_log` where `member_id` = $member_id and `issue_idx` = $issue_idx and `raw_idx` = $raw_idx and `raw_create` = '{$raw_create}' ";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    if (!$row) {
        $query = "insert into `issue_log` set
                        `member_id` = $member_id, 
                        `issue_idx` = $issue_idx,
                        `raw_idx` = $raw_idx,
                        `contents` = '{$contents}',
                        `push_read_YN` = 'N',
                        `target_user` = '{$target_user}',
                        `raw_create` = '{$raw_create}',
                        create_at=now() ";

        $result = mysqli_query($conn, $query);
    }

}
?>
