<div class="sidebar" >
  <!-- Sidebar user panel (optional) -->
<!--  <div class="user-panel mt-3 pb-3 mb-3 d-flex">-->
<!--    <div class="image">-->
<!--      <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
<!--    </div>-->
<!--    <div class="info">-->
<!--      <a href="#" class="d-block">--><?php //echo $_SESSION['name'].'|'.$_SESSION['level'];?><!--</a>-->
<!---->
<!--    </div>-->
<!--  </div>-->
    <?php
    if ($_SESSION['user_type'] == "admin") {
        include_once "sidebar_admin.php";
    } else {
        if ($_SESSION['user_id'] == "user1" ) {
            include_once "sidebar_user.php";
        } else if ($_SESSION['user_id'] == "user2" || $_SESSION['user_id'] == "user3") {
            include_once "sidebar_user.php";
        }
    }
    ?>

</div>
