<!-- Sidebar Menu -->
<nav class="mt-2">

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-header">조회</li>
        <li class="nav-item">
            <a href="detaildata1.php" class="nav-link  <?php if (basename($_SERVER["PHP_SELF"]) == "detaildata1.php") {echo 'active';} ?>  ">
                <i class="nav-icon far fa-address-card"></i>
                <p>데이터 조회</p>
            </a>
        </li>
        <li class="nav-header">관리</li>

        <li class="nav-item">
            <a href="alarm_setup.php" class="nav-link  <?php if (basename($_SERVER["PHP_SELF"]) == "alarm_setup.php") {echo 'active';} ?>  ">
                <i class="nav-icon far fa-address-card"></i>
                <p>알람 설정</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="push_history.php" class="nav-link  <?php if (basename($_SERVER["PHP_SELF"]) == "push_history.php") {echo 'active';} ?>  ">
                <i class="nav-icon far fa-address-card"></i>
                <p>알람 내역</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="temperature_setting.php" class="nav-link  <?php if (basename($_SERVER["PHP_SELF"]) == "temperature_setting.php") {echo 'active';} ?>  ">
                <i class="nav-icon far fa-address-card"></i>
                <p>온도 설정</p>
            </a>
        </li>
        <li class="nav-header">
            <?php
            $_tem = get_davice($_SESSION['user_id']);
            echo $_tem['address']."-".$_tem['board_type']."-".$_tem['board_number'];
            ?>
        </li>
        <li class="nav-header"><a href="/logout.php"><?php echo  $_SESSION['user_id'];?> : Logout</a></li>

    </ul>
</nav>
<!-- /.sidebar-menu -->