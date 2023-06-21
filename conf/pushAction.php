<?php
session_start();
include_once "../connect.php";

foreach ($_REQUEST as $k => $v) {
    $$k = $v;
}

$query = "INSERT INTO `push_send_data` SET
            push_title='{$push_title}',
            push_content='{$push_content}',
            push_url='{$push_url}',
            img_url='{$img_url}',
            push_target='{$push_target}',
            push_id='{$push_id}',
            send_YN='N',
            create_at=now() ";

$result = mysqli_query($conn, $query);
$last_uid = mysqli_insert_id($conn);

$push_title_arr = array();
$push_content_arr = array();

if ($last_uid) {

    $app_id = "ad255f06-bf9b-40e7-a20a-69313551d364";
    $restapi_key = "Y2Y1OGI1YmQtMzM4Yi00MzMwLTgwOTMtOTcyNDQ4NDQ5YjVj";

    $push_title_arr['en'] = $push_title;
    $push_content_arr['en'] = $push_content;
    $data['']= '';


    $url = "https://onesignal.com/api/v1/notifications";
    $body = array(
        "app_id" => $app_id,
        "included_segments" => $push_target,
        "include_player_ids" => [],
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

    if ($response['id'] && $status_code == 200 ) {
        $query = "UPDATE `push_send_data` SET send_YN='Y', update_at=now() where idx = {$last_uid} ";
        $result = mysqli_query($conn, $query);
    }
}

header("Location:../AdminLTE/push_send.php");

?>