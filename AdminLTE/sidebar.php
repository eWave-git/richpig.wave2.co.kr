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

        if ($_SESSION['user_id'] == "savebox1") {
          include_once "richpig_sidebar1.php";
        } else if ($_SESSION['user_id'] == "savebox2") {
          include_once "richpig_sidebar2.php";
        } else if ($_SESSION['user_id'] == "savebox3") {
          include_once "richpig_sidebar3.php";
        } else if ($_SESSION['user_id'] == "savebox4") {
          include_once "richpig_sidebar4.php";
        } else if ($_SESSION['user_id'] == "savebox5") {
          include_once "richpig_sidebar5.php";
        } else if ($_SESSION["user_id"] == "user3"){
          include_once "jisu_sidebar.php";
        }

    ?>

</div>
