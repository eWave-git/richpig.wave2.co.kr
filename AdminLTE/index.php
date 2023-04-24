<?php
session_start();

include_once "../lib/common.php";
include_once "../conf/loginCheck.php";
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
        <?php 
        if ($_SESSION['user_type'] == "admin") {
            include_once "logo.php";
        } else if ($_SESSION['user_id'] == "user1" ||$_SESSION['user_id'] == "user2" || $_SESSION['user_id'] == "user3") {
            include_once "logo_w.php";
        }
        ?>

        <!-- Sidebar -->

        <?php 
        if ($_SESSION['user_type'] == "admin") {
            include_once "sidebar.php";
        } else if ($_SESSION['user_id'] == "user1" ||$_SESSION['user_id'] == "user2" || $_SESSION['user_id'] == "user3") {
            include_once "sidebar_user.php";
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
</body>
</html>
<?php
