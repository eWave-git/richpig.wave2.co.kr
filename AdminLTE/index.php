<?php
session_start();

include_once "../lib/common.php";
////include_once "../conf/loginCheck.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php  include_once "../connect.php"; ?>
<?php  include_once "header.php"; ?>
<?php // include_once "../conf/router.php"; ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <?php include_once "preloader.php" ?>

    <!-- Navbar -->
    <?php  include_once "navbar.php"; ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <?php include_once "logo.php" ?>


        <!-- Sidebar -->

        <?php 
        if ($_SESSION['user_type'] == "admin" || $_SESSION['user_id'] == "richpig1") {
            include_once "sidebar.php";
        } else if ($_SESSION['user_id'] == "user1"
            || $_SESSION['user_id'] == "richpig2"
            || $_SESSION['user_id'] == "user2"
            || $_SESSION['user_id'] == "user3"
            || $_SESSION['user_id'] == "richpig3"
        ) {
            include_once "sidebar.php";
        }
        ?>

        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Content Header (Page header) -->
        <?php include_once "content_header.php"; ?>
        <!-- /.content-header -->

        <!-- Main content -->
        <?php

        if ($_SESSION['user_type'] == "admin") {
            include_once "dashboard.php";
        } else if ($_SESSION['user_id'] == "richpig1") {
            include_once "richpig1_dashboard.php";
        } else if ($_SESSION['user_id'] == "richpig2") {
            include_once "richpig2_dashboard.php";
        } else if ($_SESSION['user_id'] == "richpig3") {
            include_once "richpig3_dashboard.php";
        } else if ($_SESSION['user_id'] == "user1") {
            include_once "user1_dashboard.php";
        } else if ($_SESSION['user_id'] == "user2") {
            include_once "user2_dashboard.php";
        } else if ($_SESSION['user_id'] == "user3") {
            include_once "user3_dashboard.php";
        }
        ?>


        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2022-2023 <a href="http://www.wave2.co.kr">wave2.co.kr </a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.1.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include_once "footer.php"; ?>
	<script>
		//javascript 함수선언(푸시id를 받을수 있는 함수)
		function get_pushid(pushid) {
			//푸시아이디 확인(푸시아이디 저장처리등의 로직이 들어가면 됨)
			//alert(pushid);  //푸시아이디 확인(테스트용)
			$.ajax({
                url:'../conf/memberAction.php',
                type:'post',
                data: {mode:'device_update', id:'<?php echo $_SESSION['user_id'];?>', device_id: pushid},
                dataType: "json",
                success:function(obj){


                }
            })
		}
	
		//아래처럼 푸시id 가져오는 구문 사용(웹페이지가 로딩되자마자 가져오는 방법사용)
		$(document).ready(function(){
  		//document.addEventListener("DOMContentLoaded", function(){
			setTimeout(function(){
				webkit.messageHandlers.cordova_iab.postMessage(JSON.stringify({"action": "getpushid","callback": "get_pushid"}));
			},1500);
		})

		//참고사항)아래처럼 곧바로 로컬스토리지를 사용해 조회할수도 있으나,
		//최초 한번 앱설치후 실행시엔, 약간의 지연시간이(수초내외) 생겨 가져오지 못할수 있음.
		$(document).ready(function(){
  		//document.addEventListener("DOMContentLoaded", function(){
			pushid = localStorage.getItem("pushid");
		})
	</script>
</body>
</html>
<?php
